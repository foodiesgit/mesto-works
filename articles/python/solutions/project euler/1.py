#find the sum of all multiples of 3 or 5 below 100.
#100 kadar olan sayilarin 3'e ve 5'e tam bolunenleri bulun
def test(x):
  if x % 3 == 0 or x % 5 == 0:
    return True
result = 0
for item in range(1,100):
    if test(item):
      result += item
print(result)
 #without function-------------------------------------------
# result = 0
# for item in range(1,100):
#     if item % 3 == 0 or item % 5 == 0:
#       result += item
# print(result) 
      