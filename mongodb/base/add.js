const express = require('express')
const app = express()
const cors = require('cors')
const db = require('../db')
const Users = require('../usersSchema.js')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))

app.get('/', async(req, res) => {
  const newUser = new Users({
    name:"Hasan",
    password:"1234",
    salery:4000,
    language:['Python','Javascript'],
    messages:[{userName:"Hasan",text:'Hello'}],
    scores:[40],
    children:[
      {name:'Faruk',age:12,gender:"male"},
      {name:'Tarik',age:6,gender:'female'}
    ]
  })
  await newUser.save()
  const result = await Users.find()
  res.json(result)
})

app.listen(3000, () => {
  console.log('Server is running...')
})