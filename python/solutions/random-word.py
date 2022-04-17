import random

name = ['Karl','Viladimir','Fredrich']
lastname = ['Marx','Lenin','Engels']
def randomWords(x,y):
 return f'{random.choice(x)}  {random.choice(y)}'

for item in range(10):
  print(randomWords(name, lastname))