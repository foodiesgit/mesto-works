const express = require('express')
const app = express()
const fs = require('fs')

app.use(express.json())

app.get('/', (req, res, next) => {
  console.log(req)
  let d = new Date()
  let logger =  req.url +'\n'+ req.method +'\n'+ d.toLocaleDateString() + '\n'
  fs.appendFile('./logger.txt', logger,(err) => {
    if (!err) {
      console.log('Done...')
    }
  })
  res.send({result: JSON.stringify(req.url)})
})


app.listen(3000, () => {
  console.log('Server is running...')
})