const express = require('express')
const app = express()
const cors = require('cors')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))

//or include as global
app.use('/',  require('./modules/router'))

app.use((error, req, res, next)=>{
  console.log(error)
})
app.listen(process.env.PORT || 3000, () => {
  console.log('Server is running...')
})