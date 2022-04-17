with open('myfile.txt','r', encoding = 'utf-8') as rfile: #auto close method
  rfile.seek(6)
  print(rfile.read(5))