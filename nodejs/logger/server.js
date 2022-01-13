const express = require('express')
const app = express()
const morgan  = require('morgan')
const fs = require('fs')

app.use(morgan('combined'))

app.get('/', (req, res, next) => {
  console.log(req)
  let logger =  req.url +' '+ req.method +'\n'
  fs.appendFile('./logger.txt', logger,(err) => {
    if (!err) {
      console.log('Done...')
    }
  })
  res.send(req)
})


app.listen(3000, () => {
  console.log('Server is running...')
})