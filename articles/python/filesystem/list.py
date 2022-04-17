#methods short way list comprehension
strMethods = [item for item in dir(str) if not item.startswith('__')]
print(strMethods)
#----------------------------------list methods
# listMethods = []
# for item in dir(list):
#   if item.startswith('__'):
#     continue
#   else:
#     listMethods.append(item)