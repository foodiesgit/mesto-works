from datetime import datetime

dt = datetime.now()
#Dates----------------------------------------
print(f'Full Date----------------  {dt}')
print(f'Short Date --------------  {dt.strftime("%x")}')
print(f'Year Date ---------------  {dt.strftime("%Y")}')
print(f'Month Date --------------  {dt.strftime("%m")}')
print(f'Year Day ----------------  {dt.strftime("%j")}')
print(f'Month Day ---------------  {dt.strftime("%d")}')
print(f'Week Day ----------------  {dt.strftime("%w")}')
print(f'Week Day ----------------  {dt.strftime("%u")}')

print('***************************************************')
#Times----------------------------------------
print(f'Full Time ---------------  {dt.strftime("%X")}')
print(f'Hour Time ---------------  {dt.strftime("%H")}')
print(f'Minute Time -------------  {dt.strftime("%M")}')
print(f'Second Time -------------  {dt.strftime("%S")}')
