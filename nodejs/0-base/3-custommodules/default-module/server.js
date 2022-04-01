const express = require('express')
const app = express()
const cors = require('cors')
const user = require('./module/userclass')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))

app.get('/',(req,res)=>{
  let user1 = new user('Mesto',45)
  let user2 = new user('Baran',40)
  res.send(`
    <h2>Default Module</h2>
    <p>${user1.showUser()}</p>
    <p>${user2.showUser()}</p>
  `)
})
app.listen(process.env.PORT || 3000, () => {
  console.log('Server is running...')
})