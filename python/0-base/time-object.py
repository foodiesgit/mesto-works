import time 
tt = time.localtime(time.time())
print(f'Full Time ----------------  {tt.tm_year}')
print(f'Month --------------------  {tt.tm_mon}')
print(f'Year Day -----------------  {tt.tm_yday}')
print(f'Month Day ----------------  {tt.tm_mday}')
print(f'Week Day -----------------  {tt.tm_wday}')
print(f'Hour ---------------------  {tt.tm_hour}')
print(f'Minute -------------------  {tt.tm_min}')
print(f'Second -------------------  {tt.tm_sec}')