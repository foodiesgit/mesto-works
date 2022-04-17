import time

def calcTime(fun):
  def wrapper(*args):
    start = time.time()
    fun(*args)
    finish = time.time()
    print(f"Proccess time {finish - start} seconds.")
  return wrapper

@calcTime
def getSquare(args):
  for item in args:
    print(item * item)

@calcTime
def getSum(args):
  for item in args:
    print(item + item)

getSquare(range(5,10))
getSum(range(5,10))