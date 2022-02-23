const express = require('express')
const app = express()
const path = require('path')
const cors = require('cors')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))


//use auth direct here
//app.use('/account',(req, res, next) only for account
app.use((req, res, next) => {
  // type in the browser ?admin=true
  if (req.query.admin === 'true') {
    console.log(req.httpVersion)
    next()
  } else {
    res.send('Please as admin!')
  }
})
app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname, '/index.html'))
})
app.get('/home', function (req, res) {
  res.sendFile(path.join(__dirname, '/home.html'))
})
app.get('/account', function (req, res) {
  res.sendFile(path.join(__dirname, '/account.html'))
})

app.listen(process.env.PORT || 3000)