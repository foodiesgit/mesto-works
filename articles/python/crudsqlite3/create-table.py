import db

def usersTable():
  db.cursor.execute("CREATE TABLE IF NOT EXISTS users(name TEXT, pass TEXT)")
  db.con.commit()
  db.con.close()
  
usersTable()