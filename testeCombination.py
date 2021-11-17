#!/usr/bin/env python
import conexaoBancoDados

class Produto ( object ):

    def __init__(self, idProdutoArray, idPrecoArray, idTipoAnimalArray):
        self.produto = idProdutoArray
        self.preco = int(idPrecoArray)/10
        self.animal = idTipoAnimalArray

    def getPreco (self):
        return self.preco
    
    def getProduto (self):
        return self.produto

    def getAnimal (self):
        return self.animal

    def __str__(self):
        return self.produto  


def criarMenuProdutos(idProdutoArray, idPrecoArray, idTipoAnimalArray):
    menu = [ ]
    for i in range( len ( idProdutoArray ) ):
        menu.append ( Produto (idProdutoArray[i], idPrecoArray[i], idTipoAnimalArray[i]) )
    return menu

def testeGanancia(itensMenu, restricao, argEscolha):
    escolhida, custo = greedy(itensMenu, restricao , argEscolha)
    idsSugestao = ""

    for item in escolhida:
        idsSugestao = idsSugestao + "," + str(item)  
    idsSugestao = idsSugestao[1:]
    enviarBanco(idsSugestao)
    #for comida in escolhida :
    #    print( '    ' , comida)
    #print()

######################################################3
def greedy(itens, maxValor, argEscolha):
    copiaMenu = sorted( itens, key = argEscolha, reverse = True )
    # reverse = True significa ordem decrescente
    resultado = [ ]
    custoTotal, totalCalorias = 0.0, 0.0
    for i in range( len(copiaMenu ) ):
        if (totalCalorias + copiaMenu[ i ].getPreco() ) <= maxValor :
            resultado.append( copiaMenu[ i ] )
            totalCalorias  += copiaMenu[i].getPreco()
            custoTotal += copiaMenu[ i ].getPreco()
    return (resultado, custoTotal)

def enviarBanco(idsSugestao):
    ### Alterar a Tabela #######
    sqlUpdate = "UPDATE `cliente` SET `cli_resSugestao` = %s WHERE `cli_id` = %s"
    data = (str(idsSugestao), idCliente)

    #Tenta Atualizar os dados
    cursor.execute(sqlUpdate, data)

    # Aceita as Mudanças
    db.commit()

# Valores
idTipoAnimalArray = conexaoBancoDados.idTipoAnimalArray
idPrecoArray = conexaoBancoDados.idPrecoArray
idProdutoArray = conexaoBancoDados.idProdutoArray
idCliente = conexaoBancoDados.idCliente
idPrecoSugerido = conexaoBancoDados.idPrecoSugerido
cursor = conexaoBancoDados.cursor
db = conexaoBancoDados.db

# CriarMenu(Produto, Preço, Animal)
menuProdutos = criarMenuProdutos(idProdutoArray, idPrecoArray, idTipoAnimalArray)

def testarOpcoesGreedy(menuProdutos, maxValor):
    testeGanancia( menuProdutos, maxValor, Produto.getPreco )



testarOpcoesGreedy(menuProdutos, int(idPrecoSugerido))   
