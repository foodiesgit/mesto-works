import os
if os.path.exists("myfolder"):
  os.rmdir("myfolder")
else:
  print("The folder does not exist")