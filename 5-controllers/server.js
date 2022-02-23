const express = require('express')
const app = express()
const cors = require('cors')
const router = require('./models/router')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))


app.use(express.json())
app.use(express.urlencoded({extended: true}))

//or include as global
app.use('/', router)
app.use((req, res)=>{
  res.status(404).send('Page Not Found')
})
app.listen(process.env.PORT || 3000, console.log('Server is running...'))