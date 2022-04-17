def isLeapYear(year:int):
  if year % 4 == 0:
    if year % 100:
      if year % 400:
        return True
    else:
      return False
    
for item in range(2020, 1972, -1):
  if isLeapYear(item):
    print(f'{item}: is Leap Year.')