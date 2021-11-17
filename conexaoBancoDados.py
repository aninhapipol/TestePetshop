
#!/usr/bin/env python

from typing import ItemsView
import pymysql
import re

# Abrir arquivo e pegar variavél
with open('idCliente.txt', 'r') as f:
    idCliente = f.readline()

# Abre conexão com o Banco de dados
db = pymysql.connect(host='localhost', user='root', password='', database='banco_petshop', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)
cursor = db.cursor()
data = (idCliente)

# Query para trazer valor escolhido pelo cliente
sqlPrecoSugerido = "SELECT cli_precoSugerido FROM `cliente` WHERE cli_id=%s"
cursor.execute(sqlPrecoSugerido,data)
precoSugerico = cursor.fetchall()

# Query para trazer id do produto
sqlProduto = "SELECT pro_id FROM `produto` WHERE pro_tipo= (SELECT cli_animal FROM `cliente` WHERE cli_id=%s)"
cursor.execute(sqlProduto,data)
idProduto = cursor.fetchall()

# Query para trazer tipo de animal
sqlAnimal = "SELECT pro_tipo FROM `produto` WHERE pro_tipo= (SELECT cli_animal FROM `cliente` WHERE cli_id=%s)"
cursor.execute(sqlAnimal,data)
idTipoAnimal = cursor.fetchall()

# Query para trazer id do produto
sqlPreco = "SELECT ROUND(`pro_valor`, 0) as pro_valor FROM `produto` WHERE pro_tipo= (SELECT cli_animal FROM `cliente` WHERE cli_id=%s)"
cursor.execute(sqlPreco,data)
idPreco = cursor.fetchall()


idPrecoArray = []  
idTipoAnimalArray = []  
idProdutoArray = []   
idPrecoSugerido = 0

# Transforma precoSugerido
for valor in precoSugerico:
    valorTratado = re.sub("[^0-9,]", "", str(valor)).split(",")
    for item in  valorTratado:  
        idPrecoSugerido = item


# Transforma Produto
for valor in idProduto:
    valorTratado = re.sub("[^0-9,]", "", str(valor)).split(",")
    for item in  valorTratado:  
        idProdutoArray.append(item)

# Transforma o tipo de animal
for valor in idTipoAnimal:
    valorTratado = re.match("{'\w*':\s'(?P<teste>\w*)'}", str(valor))
    valorTratado = valorTratado.group('teste').split(",")
    for item in  valorTratado:  
        idTipoAnimalArray.append(item)

# Transforma Preco
for valor in idPreco:
    valorTratado = re.sub("[^0-9,]", "", str(valor)).split(",")
    for item in  valorTratado:  
        idPrecoArray.append(item)
