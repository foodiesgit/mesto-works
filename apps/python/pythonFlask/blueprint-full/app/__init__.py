from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from os import path
from datetime import timedelta


db = SQLAlchemy()
DB_NAME = 'test.db'

def create_app():
  app = Flask(__name__)
  app.config['SECRET_KEY'] = 'secret'
  app.permanent_session_lifetime = timedelta(minutes=1)
  app.config['SQLALCHEMY_DATABASE_URI'] = f'sqlite:///C:/works/pythonFlask/{DB_NAME}'
  db.init_app(app)

  from .home import home
  from .auth import auth
  from .admin import admin

  app.register_blueprint(home, url_prefix='/')
  app.register_blueprint(auth, url_prefix='/')
  app.register_blueprint(admin, url_prefix='/')

  from . import models
  create_db(app)
  return app

def create_db(app):
  if not path.exists('sqlite:///C:/works/pythonFlask/{DB_NAME}'):
    db.create_all(app=app)
    print('Created')
