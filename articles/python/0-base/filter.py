#----------------------------------------numbers
numbers = [1,2,3,4,5,6,7,8,9,10]
# def double(x):
#   if x % 2 == 0:
#     return True
#   return False
# result = list(filter(double, numbers))
# print(result)
# -----------------------------------------------------#numbers with lambda
# result = list(filter(lambda x: x % 2 == 0, numbers))
# print(result)
# ---------------------------------------------------------------filter startswith
# lang = ["Html","Css","Javascript","Nodejs","Python","Java"]
# result = list(filter(lambda x: x.startswith('J'), lang))
# print(result)
# ----------------------------------------------------------------filter find letter
# lang = ["Html","Css","Javascript","Nodejs","Python","Java"]
# result = list(filter(lambda x: 't' in x, lang))
# print(result)
# -----------------------------------------------------------------filter find str
# lang = ["Html","Css","Javascript","Nodejs","Python","Java",1,2,3,True]
# result = list(filter(lambda x: isinstance(x,str), lang))
# print(result)
# ------------------------------------------------------filter find letter in json
# person = [
#   {"name":"Mesto","age":30},
#   {"name":"Baran","age":50},
#   {"name":"Cavdar","age":20}
# ]
# result = list(filter(lambda x: x["name"].startswith('M'), person))
# print(result)