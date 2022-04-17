#--------------------------------------stars pattern
for item in range(1,9,2):
  print(f"{'*' * item:^9}")
#--------------------------------------numbers pattern
for item in range(1,6):
  for subitem in range(1,6):
    print(f"{item*subitem:4}",end="")
  print()
