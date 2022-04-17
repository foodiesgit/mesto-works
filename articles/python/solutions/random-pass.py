import random
charecters = 'qwertyuiopasdfghjklzxcvbnm~!@#$%^&*123456789QWERTYUIOPASDFGHJKLZXCVBNM'
password = ''
for item in range(20):
  password += random.choice(charecters)
print(password)