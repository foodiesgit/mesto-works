snum = int(input('Enter a number: '))
consum = str(snum)
result = 0
for item in consum:
  result += int(item)
print(f" Total is: {result}")