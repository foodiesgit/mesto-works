from flask import Flask, render_template, url_for, redirect, request, session, flash
app = Flask(__name__)
from datetime import timedelta
from flask_sqlalchemy import SQLAlchemy

app.secret_key = 'secret'
app.permanent_session_lifetime = timedelta(minutes=1)

app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///C:/works/pythonFlask/test.db'
db = SQLAlchemy(app)

class Users(db.Model):
  id = db.Column(db.Integer, primary_key=True)
  name = db.Column(db.String(80), unique=True, nullable=False)
  password = db.Column(db.String(120), nullable=False)

  def __repr__(self):
    return '<Users %r>' % self.id

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
    user = Users.query.filter_by(name = request.form['name']).first_or_404()
    if user:
      session_permanent = True
      session['name'] = user.name
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
    return redirect('login')

@app.route('/admin')
def admin():
  if session:
    return render_template('admin.html', title='admin', name=session['name'])
  else:
    return redirect('login')

if __name__ == '__main__':
  app.run(debug = True)