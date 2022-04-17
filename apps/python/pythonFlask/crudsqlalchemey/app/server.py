from flask import Flask, render_template,url_for,request, redirect
app = Flask(__name__)
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
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
  result = Users.query.order_by(Users.name).all()
  return render_template('index.html', title='Home', users=result)

@app.route('/detail/<param>')
def detail(param):
  result = Users.query.get_or_404(param)
  return render_template('detail.html', title='Detail', user=result)


@app.route('/insert', methods = ['POST', 'GET'])
def insert():
  if request.method == 'POST':
    newUser = Users(
      name = request.form['name'],
      password = request.form['password']
    )
    db.session.add(newUser)
    db.session.commit()
  return render_template('insert.html', title='insert')


@app.route('/detail/update/<param>', methods = ['POST', 'GET'])
def update(param):
  if request.method == 'GET':
    result = Users.query.get_or_404(param)
    return render_template('update.html', title='Update', user=result)
  else:
    updateUser = Users.query.get_or_404(param)
    updateUser.password = request.form['password']
    db.session.commit()
    return redirect(url_for('index'))


@app.route('/detail/delete/<param>', methods = ['POST'])
def delete(param):
  deleteUser = Users.query.get_or_404(param)
  db.session.delete(deleteUser)
  db.session.commit()
  return redirect(url_for('index'))

if __name__ == '__main__':
  app.run(debug = True)