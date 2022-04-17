import db

def addUsers():
  db.cursor.execute("INSERT INTO users VALUES('Baran','0000')")
  db.con.commit()
  db.con.close()
  
addUsers()