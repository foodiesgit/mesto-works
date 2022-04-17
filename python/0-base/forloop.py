numbers = [0,1,2,3,4,5,6,7,8,9]
numbers2 = [1,2,3,4,5]
numbers4 = [6,7,8,9,10]
numbers3 = [[1,2,3],[4,5,6],[7,8,9]]
letters = 'ABC'
# newList = [item for item in numbers]
# print(newList)
#------------------- square of numbers
# newList = [item * item for item in numbers]
# print(newList)
#------------------- prime numbers
# newList = [item for item in numbers if item % 2 != 0]
# print(newList)
#-------------------numbers to letters
# newList = [(item, subitem) for item in numbers for subitem in letters]
# print(newList)
#-------------------numbers multiples
# newList = [item * item2 for item in numbers2 for item2 in numbers4 if item * item2 > 10]
# print(newList)
#-------------------numbers intersection
# newList = [item for item in numbers if not item in numbers2]
# print(newList)
#-------------------numbers flat
# newList = [subitem for item in numbers3 for subitem in item]
# print(newList)
#-------------------unpacking
# newList = [1,3,5]
# x, y, z = newList
# print(print(x*y*z))
#-------------------if you dont know count of numbers use below
# newList = [1,3,5]
# result = 1
# for item in newList:
#   result *= item
# print(result)