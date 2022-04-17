newList = []
for item in range(5):
  mmnum = int(input('Enter new number: '))
  newList.append(mmnum)
print('---------------------------------------------------')
print(f" Min number is: {min(newList)}")
print(f" Max number is: {max(newList)}")