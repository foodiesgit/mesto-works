const express = require('express')
const app = express()
const path = require('path')
const cors = require('cors')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static('public'))

//go index page
  app.get('/',  (req, res) => {
    res.sendFile(path.join(__dirname, '/public/index.html'))
  })

app.listen(3000, () => {
  console.log('Server is running...')
})