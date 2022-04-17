import db

def deleteTable():
  db.cursor.execute("DELETE FROM users")
  db.cursor.execute("SELECT * FROM users")
  result = db.cursor.fetchall()
  db.con.commit()
  db.con.close()
  for item in result:
      print(item)
  
deleteTable()