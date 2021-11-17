# -*- coding: utf-8 -*-
"""
Created on Thu May  9 15:09:35 2019

@author: Gregorio
"""

class Comida ( object ):

    def __init__(self, nome, custo, cal):
        self.nome = nome
        self.custo = custo
        self.calorias = cal

    def getCusto (self):
        return self.custo
    
    def getCalorias (self):
        return self.calorias

    def custoPorCalorias (self):
        return self.getCusto( ) / self.getCalorias( )

    def __str__(self):
        return self.nome + ': <' + str(self.custo)\
 		 + ', ' + str(self.calorias) + '>'




def criarMenu(nomes, custo, calorias):
    menu = [ ]
    for i in range( len ( nomes ) ):
        menu.append ( Comida (nomes[i], custo[i], calorias[i]) )
    return menu




def greedy(itens, maxCalorias, argEscolha):
    copiaMenu = sorted( itens, key = argEscolha, reverse = True )
    # reverse = True significa ordem decrescente
    resultado = [ ]
    custoTotal, totalCalorias = 0.0, 0.0
    for i in range( len(copiaMenu ) ):
        if (totalCalorias + copiaMenu[ i ].getCalorias( ) ) <= maxCalorias :
            resultado.append( copiaMenu[ i ] )
            totalCalorias  += copiaMenu[i].getCalorias( )
            custoTotal += copiaMenu[ i ].getCusto()
    return (resultado, custoTotal)



def testeGanancia(itensMenu, restricao, argEscolha):
    escolhida, custo = greedy(itensMenu, restricao , argEscolha)
    print( 'Custo Total do item escolhido = ', custo )
    for comida in escolhida :
        print( '    ' , comida)
    print()
    

nomes = ['vinho', 'cerveja', 'coca cola', 'pizza',
         'hamburguer', 'fritas', 'fruta', 'donuts']
valores = [89, 90, 79, 95, 100, 90, 50, 10]
calorias = [123, 154, 150, 258, 354, 365, 95, 195]

#criarMenu(nomes, valores, calorias)
cardapio = criarMenu(nomes, valores, calorias)

"""
#testeGanancia(itens, restricao, chave )
print("Critério: Menor Custo " )
testeGanancia( cardapio, 1000, Comida.getCusto )
print("critério: Máximo de Calorias " )
testeGanancia( cardapio, 1000, Comida.getCalorias, )
print("critério: Melhor relação de custo por calorias " )
testeGanancia( cardapio, 1000, Comida.custoPorCalorias, )    

"""




def testarOpcoesGreedy(cardapio, maxCalorias):
    print('Critério: Menor Custo para', maxCalorias,
          'calorias')
    print('Primeiro coloca no prato, os alimentos mais caros')
    testeGanancia( cardapio, maxCalorias, Comida.getCusto )

    print('Critério: Máximo de Calorias para', maxCalorias,
          'calorias')
    print('Primeiro coloca no prato, os alimentos menos calóricos')
    testeGanancia(cardapio, maxCalorias,
               lambda x: 1/Comida.getCalorias(x))

    print('\nCritério: Melhor relação de custo por calorias',
          maxCalorias, 'calorias')
    print('Primeiro coloca no prato, os alimentos com melhor'
          'relação custo/caloria')
    testeGanancia(cardapio, maxCalorias, Comida.custoPorCalorias)

     
#testarOpcoesGreedy(cardapio, 1000)   

testarOpcoesGreedy(cardapio, 850)   





