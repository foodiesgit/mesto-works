const express = require('express')
const app = express()
const cors = require('cors')
const { test1, test2 } = require('./module/functions')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))

app.get('/',(req,res)=>{
  res.send(`
    <h2>Function Module</h2>
    <h3>${test1()}</h3>
    <h3>${test2()}</h3>
  `)
})
app.listen(process.env.PORT || 3000, () => {
  console.log('Server is running...')
})