from flask import Flask, render_template, url_for, redirect, request, session, flash
app = Flask(__name__)
import sqlite3
from datetime import timedelta

app.secret_key = 'secret'
app.permanent_session_lifetime = timedelta(minutes=1)
@app.route('/')
def index():
  return render_template('index.html', title='Home')


@app.route('/login', methods=['POST','GET'])
def login():
  if request.method == 'GET':
    if session:
      return redirect('admin')
    else:
      return render_template('login.html', title='Login')
  else:
    con = sqlite3.connect('test.db')
    user = con.cursor().execute("SELECT name FROM users WHERE name = ?",(request.form['name'],)).fetchone()
    con.commit()
    con.close()
    if user:
      session_permanent = True
      session['name'] = user[0]
      return redirect('admin')
    else:
      return render_template('login.html', title='Login', error='no user')


@app.route('/logout', methods=['POST'])
def logout():
  if session:
    session.pop('name', None)
    flash('You have been logged out!','info')
    return redirect('/')
  else:
    return redirect('/login')

@app.route('/admin')
def admin():
  if session:
    return render_template('admin.html', title='admin', name=session['name'])
  else:
    return redirect('login')

if __name__ == '__main__':
  app.run(debug = True)