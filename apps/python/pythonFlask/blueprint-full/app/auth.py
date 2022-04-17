from flask import Blueprint, render_template, url_for, request, redirect, flash, session
from werkzeug.security import generate_password_hash, check_password_hash
from .models import Users,db
from flask import current_app
auth = Blueprint('auth', __name__)

@auth.route('/login', methods=['GET','POST'])
def login():
  if request.method == 'GET':
    return render_template('login.html', title='Login')
  else:
    user = Users.query.filter_by(name = request.form.get('name')).first()
    if user:
      if check_password_hash(user.password, request.form.get('password')):
        session_permanent = True
        session['name'] = user.name
        return redirect('admin')
      else:
        return render_template('login.html', title='Login', error='no password')
    else:
      return render_template('/signup.html', title='Signup', error='You are not user!Please signup...')

@auth.route('/signup', methods=['GET','POST'])
def sign_up():
  if request.method == 'POST':
    newUser = Users(
      name = request.form.get('name'),
      password = generate_password_hash(request.form.get('password'), method="sha256")
    )
    db.session.add(newUser)
    db.session.commit()
  return render_template('signup.html',title='Signup')

@auth.route('/logout', methods=['POST'])
def logout():
  if session:
    session.pop('name', None)
    flash('You have been logged out!','info')
    return redirect('/')