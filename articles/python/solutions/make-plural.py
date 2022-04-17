words = ['Fruit','Tool','Berry','Glory','Boss','Toes','Tax']
def plural(param):
  pluralList = list()
  for item in words:
    if item.endswith('s') or item.endswith('x'):
      item += 'es'
    elif item.endswith('y'):
      item = item[:-1] + 'ies'
    else:
      item += 's'
    pluralList.append(item)
  return pluralList
    
print(plural(words))