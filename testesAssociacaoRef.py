from collections import Counter  
import itertools  
import sys  
#Parâmetros de suporte e confiança  
s = 0.5  
c = 0.5  

#Conjunto de transações  
transacoes = {      1: {"1", "7", "16"},  
                    2: {"2", "5", "8","10"},  
                    3: {"3", "14", "15"},  
                    4: {"14", "15"},  
                    5: {"3", "4", "15"},  
                    6: {"14", "15"},  
                    7: {"3", "14"},  
                    8: {"3", "15"},  
                    9: {"4", "15"},  
                    10: {"3", "4", "15"},
                    11: {"3", "4", "15"},  
                    12: {"3", "4", "15"},  
                    13: {"3", "14", "15"},  
                    14: {"14", "15"},  
                    15: {"3", "4", "15"},  
                    16: {"14", "15"},  
                    17: {"3", "4", "15"},  
                    18: {"3", "4", "15"},  
                    19: {"4", "15"},  
                    20: {"3", "4", "15"},
 		                21: {"3", "4", "15"},  
                    22: {"3", "4", "15"},  
                    23: {"3", "14", "15"},  
                    24: {"3", "4", "15"},  
                    25: {"3", "4", "15"},  
                    26: {"3", "4", "15"},  
                    27: {"3", "4", "15"},  
                    28: {"3", "4", "15"},  
                    29: {"4", "15"},  
                    30: {"3", "4", "15"},
                    31: {"3", "4", "15"},  
                    32: {"2", "5", "8","10"},  
                    33: {"3", "14", "15"},  
                    34: {"3", "4", "15"},  
                    35: {"3", "4", "15"},  
                    36: {"3", "4", "15"},  
                    37: {"3", "14"},  
                    38: {"3", "15"},  
                    39: {"4", "15"},  
                    40: {"3", "4", "15"},
                    41: {"1", "7", "16"},  
                    42: {"3", "4", "15"},  
                    43: {"3", "14", "15"},  
                    44: {"3", "4", "15"},  
                    45: {"3", "4", "15"},  
                    46: {"14", "15"},  
                    47: {"3", "4", "15"},  
                    48: {"3", "15"},  
                    49: {"3", "4", "15"},  
                    50: {"2", "10", "11"}  
                    }  
print(transacoes)
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
      if set(v).intersection(set(i)) == set(i):  
        itemTransactions.append(i)  
  ret = []  
  for k,v in sorted(Counter(itemTransactions).items()):  
    if v >= s * len(trans):  
      ret.append([k, v])  
  return(dict(ret))  
###############################################################  

#Mostra os resultados  
print("1-itemsets mais frequentes:")  
print(frequentItems(items, transacoes, 1, s))  
print  
print("2-itemsets mais frequentes:")  
print(frequentItems(items, transacoes, 2, s))  
print  
print("3-itemsets mais frequentes:")  
print(frequentItems(items, transacoes, 3, s))  
print  
#Imprime as regras de associação  
#De acordo com o suporte e confiança  
print("Regras de associacao com suporte")  
print("e confianca maiores que 50%")  
f2 = frequentItems(items, transacoes, 2, s)  
k2 = [k for k in f2.keys()]  
v2 = [v for v in f2.values()]  
f1 = frequentItems(items, transacoes, 1, s)  
k1 = [k[0] for k in f1.keys()]  
v1 = [v  for v in f1.values()]  
for i in range(len(k2)):  
  i1 = k2[i][0]  
  i2 = k2[i][1]  
  for j in range(len(k1)):  
    if k1[j] == i1:  
      confidence = v2[i]/v1[j]  
  if v2[i] >= s * len(transacoes) and confidence >= c:  
    print("{0:<6} -> {1:<6}: ({2},{3})".format(i1, i2,str(v2[i]),confidence))  
  i1 = k2[i][1]  
  i2 = k2[i][0]  
  for j in range(len(k1)):  
    if k1[j] == i1:  
      confidence = v2[i]/v1[j]  
  if v2[i] >= s * len(transacoes) and confidence >= c:  
    print("{0:<6} -> {1:<6}: ({2},{3})".format(i1, i2,str(v2[i]),confidence))  
    print  