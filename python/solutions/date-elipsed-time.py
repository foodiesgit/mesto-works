import time
def sumFunc(n):
  stime = time.time()
  sum = 0
  for item in range(1, n + 1):
    sum += item
  ftime = time.time()

  return sum, ftime-stime


print(sumFunc(10))