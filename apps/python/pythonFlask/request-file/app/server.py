from flask import Flask, render_template, request, url_for, redirect, json
app = Flask(__name__)


@app.route('/', methods=['GET'])
def home():
  with open('C:/works/pythonFlask/soccer.json', encoding = 'utf-8') as fl:
    return render_template('home.html', title='Home', data = json.load(fl))

if __name__ == '__main__':
  app.run(debug = True)