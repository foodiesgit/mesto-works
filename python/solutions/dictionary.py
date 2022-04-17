dictionary = {
  "this":"Bu",
  "is": "Olmak",
  "a":"Bir",
  "book":"Kitap"
}

while True:
  sentence = input("Enter a word?: ")#get user word
  if sentence == "":#enter for exit
     break
   
  for item in '.!?,.':
    sentence = sentence.replace(item, '')#remove punctuation charecters
    
  words = set(sentence.lower().split())#split sentence and avoid double
  for word in words:
    wordMeaning = dictionary.get(word,"Not found!")#find key and return value
    print(f" {word.title():<10} : {wordMeaning}")#print words and meanings
print()
print('User exit!')