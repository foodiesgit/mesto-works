#methods short way list comprehension
strMethods = [item for item in dir(dict) if not item.startswith('__')]
print(strMethods)
#----------------------------------dict methods
# dictMethods = []
# for item in dir(dict):
#   if item.startswith('__'):
#     continue
#   else:
#     dictMethods.append(item)
# print(dictMethods)