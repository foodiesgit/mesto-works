import re
def checkPassword(param):
  if len(param) < 5:
    raise Exception('Password must be grater then 4 charecters!')
  elif not re.search('[a-z]', param):
    raise Exception('Password must be less one lower-case letter!')
  elif not re.search('[A-Z]', param):
    raise Exception('Password must be less one upper-case letter!')
  elif not re.search('[0-9]', param):
    raise Exception('Password must be less one digit!')
  elif not re.search('[_@$]', param):
    raise Exception('Password must be less one symbol!')
  else:
    print(f'Your password is: {param}')
while True:
  try:
    checkPassword(input('Enter password ? '))
  except Exception as err:
    print(err)
  else:
    break
  finally:
    print('Finished')