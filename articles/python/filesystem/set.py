#str methods short way list comprehension
strMethods = [item for item in dir(set) if not item.startswith('__')]
print(strMethods)

#-----------------------------------set methods
# setMethods = []
# for item in dir(set):
#   if item.startswith('__'):
#     continue
#   else:
#     setMethods.append(item)
# print(setMethods)