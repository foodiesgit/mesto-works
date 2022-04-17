from flask import Flask, render_template, request, url_for,redirect,jsonify
app = Flask(__name__)
import requests


@app.route('/', methods=['GET'])
def home():
  result = requests.get('https://jsonplaceholder.typicode.com/users')
  return render_template('home.html', title='Home', users=result.json())

@app.route('/detail/<name>/<id>', methods=['GET'])
def detail(name, id):
  result = requests.get(f'https://jsonplaceholder.typicode.com/users/{id}')
  print(result.json())
  return render_template('detail.html', title='Detail', name=name, users=result.json())


if __name__ == '__main__':
  app.run(debug = True)