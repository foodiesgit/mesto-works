#By considering the terms in the Fibonacci sequence whose values do not 
# exceed four million, find the sum of the even-valued terms.

a = 1 #first number
b = 2 #second number
sum = 2 #total

while True:
  c = a + b
  a = b
  b = c
  if c % 2 == 0:
    sum += c
  if sum > 4000000:
    break
  
print(sum)