const express = require('express')
const app = express()
const path = require('path')
const cors = require('cors')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static('public'))

//go index page
  app.get('/users',  (req, res) => {
    const users = [
      {name:'Mesto',salery:4000},
      {name:'Ali',salery:3000},
      {name:'Kenan',salery:4000}
    ]
    res.json({users})
  })

app.listen(3000, () => {
  console.log('Server is running...')
})