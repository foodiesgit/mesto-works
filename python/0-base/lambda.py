#lambda is short and anonyms function
# getSquare = lambda x: x * x
# print(getSquare(5))
#----------------------------------
# getMultiple = lambda x,y: x * y
# print(getMultiple(5,7))

# getSelfParam -----------------
# print((lambda x: x * 5)(6))
#----------------------------------
# getSum = lambda *args: sum(args)
# print(getSum(1,2,3,4,5))
#----------------------------------
# getAwarage = lambda *args: sum(args) / len(args) 
# print(getAwarage(1,2,3,4,5,6))
#----------------------------------
# persons = ['Mehmet Ali Demir', 'Hasan Baran Aslan','Kasim Kibar','Yasin kaplan']
# persons.sort(key = lambda x: x.split(' ')[-1].lower())# sort as lastname
# print(persons)
#----------------------------------
# persons = [
#   ("Mesto",40),
#   ("Baran",30),
#   ("Jhon",20)
# ]
# persons.sort()# sortas name
# persons.sort(key = lambda x: x[1])# sort as age with given age index
# print(persons)
#----------------------------------
# persons = [
#   {"name":"Mesto","age":30},
#   {"name":"Baran","age":50},
#   {"name":"Cavdar","age":20}
# ]
# persons.sort(key = lambda x: x["name"])# sort as name with given name key
# persons.sort(key = lambda x: x["age"])# sort as age with given age key
# print(persons)
# ----------------------------------
