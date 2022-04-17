words = 'Hello Python'
print(words[0]) #first letter
print(words[-1]) #last letter

print(words[:5]) #first five letters
print(words[-5:]) #last five letters

print(words[6:9]) # between 6-9 letters from start
print(words[-6:-3]) # between 6-9 letters from end

numbers = '12345678910' 
print(numbers[::2]) #step 2 from start
print(numbers[::-2]) #step 2 from end

#slice with format
print(f'{words:.5}') #5 first letter
print(f'{words:10.5} Mesto') #5 if the letters less then 10 then put 10 spaces

flotSlice = 3.5676566566
print(f'{flotSlice:.2}') #float count