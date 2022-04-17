numbers  = [1,2,3,4,5]
numbers2 = [6,7,8,9,10]
#---------------------------------all in one function no map
# newList = []
# def getSquare(x):
#   for item in x:
#     newList.append(item * item)
# getSquare(numbers)
# print(n)
# ---------------------with seperate function no map
# def getSquare(x):
#   return x * x
# newList = []
# for item in numbers:
#   newList.append(getSquare(item))
# print(newList)
# ------------------------map
# def getSquare(x):
#   return x * x
# newList = list(map(getSquare, numbers))
# print(newList)
# map with lambda------------------------
# newList = list(map(lambda x : x*x, numbers))
# print(newList)
# ------------------------map with multiple list
# def getSquareMulipleList(x,y):
#   return x + y
# newList = list(map(getSquareMulipleList, numbers, numbers2))
# print(newList)
# ------------------------map with multiple list and with lambda
# newList = list(map(lambda x, y: x + y, numbers, numbers2))
# print(newList)
# ----------------------------------------discount
# products = [["Shoos",300],["Pants",250],["Skirt",400]]
# def discount(x):
#   product,price = x[0],x[1]
#   price = price * (9/10)
#   return [product, price]
# result = list(map(discount,products))
# print(result)