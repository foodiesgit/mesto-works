forbiddenText = ['it','esek']
userText = input('Enter something!: ')
words = userText.split()
userText = ''
for item in words:
  if item in forbiddenText:
     userText += ' bip ' 
  else:
    userText += item
print(userText)