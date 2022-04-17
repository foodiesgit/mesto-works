const express = require('express')
const app = express()
const exec = require("child_process").exec

const cmd = "mongodump --host " + "localhost" + " --db " + "works"
exec(cmd, function(error, stdout, stderr) {
  if (!error) {
    console.log("DB backup generated ... ")
    __dirname + "/works"
  }
})

app.listen(3000, () => {
  console.log('Server is running...')
})
