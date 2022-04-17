def vowel(sentence, number = 0):
  words = 'aeiouAEIOU'
  for item in words:
    if item in sentence:
      number+=1
  return number
entry = input('Enter some word..')
print(vowel(entry))