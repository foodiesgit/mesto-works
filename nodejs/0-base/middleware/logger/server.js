const express = require('express')
const app = express()
const path = require('path')
const cors = require('cors')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))


//use logger for all request
app.use((req, res, next) => {
  req.test = 'Hello'
  console.log('Request: ' + req.url)
  console.log('Date: ' + Date.now())
  next()
})
app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname, '/index.html'))
})
app.get('/home', function (req, res) {
  res.sendFile(path.join(__dirname, '/home.html'))
})
app.get('/account', function (req, res) {
  console.log(req.test)
  res.sendFile(path.join(__dirname, '/account.html'))
})

app.listen(process.env.PORT || 3000)