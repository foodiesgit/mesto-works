num = int(input('Entera number: '))
fact = 1
i = 2
while i <= num:
  fact *= i
  i+=1
print(f"{num}! = {fact}")