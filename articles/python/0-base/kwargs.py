#send list as parameter
def func2(args):
  for item in args:
    if type(item) == int and type(args) != float:
      print(item * item)

list1 = [1,2,3,4,'a', 5.5, 5]
func2(list1)


#send dict as parameter
def func1(**args):
  print("Your age is " + args['age'])

dict1 = {'name':'Mesto','age':40, 'city':'Chur'}
func1(**dict1)
