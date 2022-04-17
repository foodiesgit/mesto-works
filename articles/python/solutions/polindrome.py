def polindrome(name:str):
  reverse = ''
  for item in name:
    reverse = item + reverse
  if name == reverse:
    return True
  return False

username = 'Nazan'
if polindrome(username.lower()):
  print(f'Yes')
else:
  print('No')