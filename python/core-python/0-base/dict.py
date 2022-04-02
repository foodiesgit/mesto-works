dict1 = {"Kitap":"Book","Ev":"House","Adam":"Man"}

# print(dict1)

#return pnly keys
# print(dict1.keys())

#return only value
# print(dict1.values())

#return single
# print(dict1["Adam"])
#or without error
# print(dict1.get("Ad", "There is no match key!"))

#update
# dict1["Adam"] = "People"
# print(dict1)


# dict1.update({"Adam":"People"})
# print(dict1)

#add
# dict1.update({"Kalem":"Pan","Bardak":"Glass"})
# print(dict1)

#del
# del dict1["Adam"]
# print(dict1)

#loop
# for item in dict1:
#   print(item)

#loop only values
# for item in dict1.values():
#   print(item)


#check
# print("Adam" in dict1)

#check as value
# print("Book" in dict1.values())

#return as items
# for item in dict1.items():
#   print(item)
#or
# for key, item in dict1.items():
#   print(key)

