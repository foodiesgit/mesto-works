name = 'Mesto'
lastname = 'Kaya'
age = 50

#if the letters are less then 10 put spaces until 10 else get only then letters
result = f'{name:10.10} {lastname:10.10} {age}'
print(result)


result = f'Your name: {name} \nYour lastname: {lastname} \nYour age: {age}'
print(result)

#position left until 20 leters
print(f'{name:*<20}')

#position right until 20 leters
print(f'hello{name:*>20}')

#position center until 20 leters
print(f'{name:*^20}')


flotSlice = 3.5676566566
print(f'{flotSlice:.2}') #float count

number = 123456789
print(f'{number:,}')#put comma

