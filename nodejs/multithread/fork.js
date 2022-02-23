const express = require('express')
const app = express()
const { fork } = require('child_process')

app.get('/', (req, res) => {
  const child = fork('./api.js')
  child.send('start')

  child.on('message', (sum) => {
    res.send({ sum })
  })
})

app.listen(3000, () => {
  console.log('Server is running...' + process.pid)
})