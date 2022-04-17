def reversList(numbers:list):
  newList = [item for item in reversed(numbers) if item % 2 == 0]
  return newList

coreList = [1,2,3,4,5,6,7,8,9]
print(reversList(coreList))