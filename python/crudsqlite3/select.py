import db

def selectTable():
  db.cursor.execute("SELECT * FROM users")
  result = db.cursor.fetchall()
  db.con.close()
  for item in result:
    print(item)
selectTable()