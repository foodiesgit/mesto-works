import time
from datetime import datetime
#---------------------------------------- differant time
stime = time.time()
ftime = 0
number = []
for item in range(1000000):
  number.append(item)
ftime = time.time()
print(ftime - stime)