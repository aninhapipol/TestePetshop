from collections import Counter  
import itertools  
import sys  
#Parâmetros de suporte e confiança  
s = 0.5  
c = 0.5  

#Conjunto de transações  
transacoes = {     1: {"Cerveja", "Amendoim", "Laranja"},  
                    2: {"Cerveja", "Cafe", "Laranja", "Amendoim"},  
                    3: {"Cerveja", "Laranja", "Ovos"},  
                    4: {"Cerveja", "Amendoim", "Ovos", "Leite"},  
                    5: {"Cafe", "Laranja", "Ovos", "Leite"},  
                    6: {"Cafe", "Laranja", "Ovos", "Leite"},  
                    7: {"Laranja", "Cafe", "Cerveja", "Ovos"},  
                    8: {"Amendoim", "Cafe", "Cerveja", "Ovos"},  
                    9: {"Amendoim", "Laranja", "Cerveja", "Ovos"},  
                    10: {"Amendoim", "Cafe", "Cerveja", "Ovos"}  
                    }  

#Faz a leitura do dicionário de transações  
#Armazena cada item no vetor items  
items = []   
for itemsets in transacoes.values():  
  for item in itemsets:  
    items.append(item)  
items = set(items)  

### Cria as regras de associação ##############################  
def frequentItems(items, trans, n, s):  
    itemsets = set(itertools.combinations(items, n))  
    itemTransactions = []  
    for i in itemsets:  
        for k,v in transacoes.items(): 
            print(k)
            print(v)
            print(transacoes)
            print("----------------------------------------")
            print(items)

#Mostra os resultados  
print("1-itemsets mais frequentes:")  
print(frequentItems(items, transacoes, 1, s))  
print  
