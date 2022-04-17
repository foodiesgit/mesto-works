from flask import Flask, render_template, request, url_for,redirect
app = Flask(__name__)
import sqlite3


@app.route('/')
def home():
  con = sqlite3.connect('test.db')  
  result = con.cursor().execute("SELECT * FROM users").fetchall()
  con.commit()
  con.close()
  # con.cursor().execute("CREATE TABLE IF NOT EXISTS users(name TEXT, pass TEXT)")
  # con.commit()
  return render_template('home.html', title='Home',users=result)


@app.route('/detail/<param>')
def detail(param):
  con = sqlite3.connect('test.db')
  result = con.cursor().execute("SELECT * FROM users WHERE id=?", (param)).fetchone()
  con.commit()
  con.close()
  return render_template('detail.html', title='Detail', user=result)


@app.route('/insert', methods = ['POST', 'GET'])
def insert():
  if request.method == 'POST':
    con = sqlite3.connect('test.db')
    con.cursor().execute("INSERT INTO users VALUES(NULL,?,?)", (request.form['name'], request.form['pass']))
    con.commit()
    con.close()
  return render_template('insert.html', title='insert')


@app.route('/detail/update/<param>', methods = ['POST', 'GET'])
def update(param):
  if request.method == 'GET':
    con = sqlite3.connect('test.db')
    result = con.cursor().execute("SELECT * FROM users WHERE id=?", (param)).fetchone()
    con.commit()
    con.close()
    return render_template('update.html', title='Update', user=result)
  else:
    con = sqlite3.connect('test.db')
    con.cursor().execute("UPDATE users SET pass = ? WHERE id = ?", (request.form['pass'], param))
    con.commit()
    con.close()
    return redirect(url_for('home'))


@app.route('/detail/delete/<param>', methods = ['POST'])
def delete(param):
  con = sqlite3.connect('test.db')
  con.cursor().execute("DELETE FROM users WHERE id=?", (param))
  con.commit()
  con.close()
  return redirect(url_for('home'))

if __name__ == '__main__':
  app.run(debug = True)