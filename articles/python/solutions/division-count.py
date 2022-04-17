dnum = int(input('Entera number: '))
divCount = 0
for item in range(1, dnum + 1):    
  if dnum % item == 0:
    print(item)
    divCount += 1
print(f" {dnum} has {divCount} division.")