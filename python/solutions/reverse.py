def polindrome(name:str):
  reverse = ''
  for item in name:
    reverse = item + reverse
  return reverse

username = 'Ali'
print(polindrome(username.lower()))