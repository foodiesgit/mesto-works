import base64

with open('encrypt.txt','rb') as file:
  fileContent = file.read()
  print(fileContent)
  
# base64File = base64.b64encode(fileContent) #encode
# base64File = base64.b64decode(fileContent) #decode

with open('encrypt.txt','wb') as file:
  file.write(base64File)