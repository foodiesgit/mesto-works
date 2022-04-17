#you may edit,delete the set objects but there is no self order 
#and there are no two same item in set
#and you must use set() to create empty set

# setEmpty  = set()
# print(type(setEmpty))

set1  = {'Html','Css', 'Javascript'}

# print(set1)
# print(len(set1))

# set1.add('Python')
# print(set1)

# set1.remove('Javascript')
# print(set1)
 
#use discard to romove item without error
# set1.discard('Python')
# print(set1)

# print(sorted(set))
# or
# newSet = sorted(set1)
# print(newSet)

#use intersection to find same item in between to sets
# set2 = {'Python','Javascript','Mongodb'}
# print(set1.intersection(set2))

#use difference to find difference item in between to sets
# set2 = {'Python','Javascript','Mongodb'}
# print(set1.difference(set2))
#or
# print(set2.difference(set1))

#look at the print there is only one Javascript because set must be one item one time
# set2 = {'Python','Javascript','Mongodb'}
# print(set1.union(set2))

#check item exist
# print("Css" in set1)

#check union
# set2 = {'Python','Javascript','Mongodb'}
# print("Css" in set1.union(set2))

# for item in set1:
#   print(item)