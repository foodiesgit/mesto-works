import requests
import json

res = requests.get('http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=145a2d7a62ed90214a736c2cc635765e')
print(res.text)
print('---------------------------')
result = json.loads(res.text)
print(str(result['weather'][0]['main']))
print(str(result['weather'][0]['description']))
print('temp' +' '+ str(result['main']['temp']))
