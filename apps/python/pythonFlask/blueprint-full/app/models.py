from . import db
from sqlalchemy import func


class Note(db.Model):
  id = db.Column(db.Integer, primary_key=True)
  data = db.Column(db.String(80), unique=True, nullable=False)
  date = db.Column(db.DateTime(timezone=True), default = func.now())
  user = db.Column(db.Integer, db.ForeignKey('users.id'))
  

class Users(db.Model):
  id = db.Column(db.Integer, primary_key=True)
  name = db.Column(db.String(80), unique=True, nullable=False)
  password = db.Column(db.String(120), nullable=False)
  notes = db.relationship(Note)