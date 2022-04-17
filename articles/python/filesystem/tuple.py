#str methods short way list comprehension
strMethods = [item for item in dir(tuple) if not item.startswith('__')]
print(strMethods)

#---------------------------------tuple methods
# tupleMethods = []
# for item in dir(tuple):
#   if item.startswith('__'):
#     continue
#   else:
#     tupleMethods.append(item)
# print(tupleMethods)