#!/usr/bin/python3
from collections import Counter  
import itertools  
import sys  
import pymysql
import re
import json

# Parâmetros de suporte e confiança  
s = 0.5  
c = 0.5  

# Abre conexão com o Banco de dados
db = pymysql.connect(host='localhost', user='root', password='', database='banco_petshop', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
cursor = db.cursor()

t_iten = 1
while (t_iten < 19):
    # Query para trazer os dados do banco conectado
    sql = "SELECT * FROM `transacoes` WHERE `t_itens` IN (" + str(t_iten) + ")"
    cursor.execute(sql)

    # Recebe as informações do banco em formato de lista e armazena.
    transacoes = cursor.fetchall()

    transacoesSet = {}
    items = []   
    contador = 1

    # Transforma 'transacoes' em um dict(transacoesSet) e retorna lista com todas as variaveis possivéis vinda do banco(items)
    for valor in transacoes:
        valorTratado = re.sub("[^0-9,]", "", str(valor)).split(",")
        transacoesSet.update(dict({contador: valorTratado}))
        contador = contador + 1 

        for item in  valorTratado:  
            items.append(item)

    items = set(items) 

    ########################## Cria as regras de associação ##############################  
    def frequentItems(items, trans, n, s):  
        itemsets = set(itertools.combinations(items, n))  
        itemTransactions = []  

        for i in itemsets:  
            for k,v in transacoesSet.items():  
                if set(v).intersection(set(i)) == set(i):  
                    itemTransactions.append(i)  
        ret = []  
        for k,v in sorted(Counter(itemTransactions).items()):  
            if v >= s * len(trans):  
                ret.append([k, v])  
        return(dict(ret))  

    ########################################################################################

    # Mostra os resultados  


    # Apresenta as Associações do produto


    produtoId = []
    produtoIdAssociado = []

    f2 = frequentItems(items, transacoesSet, 2, s)  
    k2 = [k for k in f2.keys()]  
    v2 = [v for v in f2.values()]  
    f1 = frequentItems(items, transacoesSet, 1, s)  
    k1 = [k[0] for k in f1.keys()]  
    v1 = [v  for v in f1.values()]  
    for i in range(len(k2)):  
        i1 = k2[i][0]  
        i2 = k2[i][1]  
        for j in range(len(k1)):  
            if k1[j] == i1:  
                confidence = v2[i]/v1[j]  
        if v2[i] >= s * len(transacoesSet) and confidence >= c: 
            produtoId.append(int(i1))
            produtoIdAssociado.append(int(i2))

    # Associa a variavel que será inserida no banco
   
    if t_iten in produtoId:
        posProduto = produtoId.index(int(t_iten))
        produtoIdAssociadoFinal = produtoIdAssociado[posProduto]
    else:
        posProduto = produtoIdAssociado.index(int(t_iten))
        produtoIdAssociadoFinal = produtoId[posProduto]

    ### Alterar a Tabela #######
    sqlUpdate = "UPDATE `produto` SET `associado` = '%s' WHERE `pro_id` = '%s'"
    data = (produtoIdAssociadoFinal, t_iten)
    t_iten += 1
    try:
        #Tenta Atualizar os dados
        cursor.execute(sqlUpdate, data)

        # Aceita as Mudanças
        db.commit()
    except Error as error:
        print(error)
