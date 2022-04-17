from datetime import datetime
#------------------------------------- find first day of month started with sunday
sunday = 0
for year in range(2001, 2021):
  for month in range(1,13):
    if datetime(year, month, 1).weekday() == 6:
      sunday += 1
print(sunday)