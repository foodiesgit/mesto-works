import time

#user input
try:
  userHour = int(input('Enter hour: '))
  userMinute = int(input('Enter minute: '))
  while True:
    dt = time.localtime(time.time())
    time.sleep(1) #print message only per second
    if userHour == dt.tm_hour and userMinute == dt.tm_min:
      print('Wake Up!')
    else:
      break
  print('Finshed')
except:
  print("Please enter a valid number!")
  