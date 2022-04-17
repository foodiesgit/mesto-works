import random
letters = 'abcdefijklmnoprstwvyzqw'
marks = '0123456789~!@#$%^&*-'
lettersUpper = letters.upper()

result = letters + lettersUpper + marks

password = random.choices(result, k=30)
print(''.join(password))
