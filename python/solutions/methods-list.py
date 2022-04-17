#str methods short way list comprehension
strMethods = [item for item in dir(str) if not item.startswith('__')]
#list methods
listMethods = []
for item in dir(list):
  if item.startswith('__'):
    continue
  else:
    listMethods.append(item)
#tuple methods
tupleMethods = []
for item in dir(tuple):
  if item.startswith('__'):
    continue
  else:
    tupleMethods.append(item)
#set methods
setMethods = []
for item in dir(set):
  if item.startswith('__'):
    continue
  else:
    setMethods.append(item)
#dict methods
dictMethods = []
for item in dir(dict):
  if item.startswith('__'):
    continue
  else:
    dictMethods.append(item)
#create classes from all methods
titles = ['String', 'List', 'Tuple', 'Set', 'Dict']
classes = [strMethods, listMethods, tupleMethods, setMethods, dictMethods]
maxLen = 0
for item in classes:
  if len(item) > maxLen:
    maxLen = len(item)
#print title
with open('methods.txt', 'w', encoding = 'utf-8') as mfile: #auto close method
  for item in titles:
    print(item, end="")
    print("-" * (30 - len(item)), end="")
    mfile.write(item)
    mfile.write("-" * (30 - len(item)))
  #print all
  for item in range(maxLen):
    print() #for new line
    mfile.write('\n')
    for subitem in classes:
      if item >= len(subitem):
        print("-----", end="")
        print(" " * 25, end="")
        mfile.write("-----")
        mfile.write(" " * 25)
      else:
        print(subitem[item], end="")
        print(" " * (30 - len(subitem[item])), end="")
        mfile.write(subitem[item])
        mfile.write(" " * (30 - len(subitem[item])))

    
    