import threading
import time

def func1():
  time.sleep(5)
  print('A1')

def func2():
  print('A2')

def func3():
  print('A3')

#sync---------------------- you have to wait 5 seconds for func2 and 3
func1()
func2()
func3()
#async--------------------- you dont have to wait for func2 and 3
# threading.Thread(target = func1).start()
# threading.Thread(target = func2).start()
# threading.Thread(target = func3).start()
