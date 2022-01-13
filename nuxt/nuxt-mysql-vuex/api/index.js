const express = require('express')
const mysql = require('mysql')
const app = express()

const conn = mysql.createConnection({
  host:'localhost',
  user:'root',
  pass:'',
  database:'gasvet'
})
conn.connect()

app.get('/', (req, res) => {
  conn.query('SELECT * FROM users',(err, result) =>{
    if (!err) {
      res.json(result)
    }
  })
})

export default {
  path:'/api',
  handler: app
}