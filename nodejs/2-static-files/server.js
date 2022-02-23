const express = require('express')
const app = express()
const path = require('path')

app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static(path.join(__dirname,'static')))//maybe you need on server path

app.use('/',  require('./api/router'))

app.use((error, req,res,next)=>{
  console.error(error)
})

app.listen(process.env.PORT || 3000,() => {
  console.log('Server is running...')
})