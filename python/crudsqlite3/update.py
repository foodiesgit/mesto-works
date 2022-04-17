import db

def updateTable():
  db.cursor.execute("UPDATE users SET age = 50 WHERE age = 40")
  db.cursor.execute("SELECT * FROM users")
  result = db.cursor.fetchall()
  db.con.commit()
  db.con.close()
  for item in result:
      print(item)
  
updateTable()