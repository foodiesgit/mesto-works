const express = require('express')
const app = express()
const { spawn } = require('child_process')
const path = require('path')
const cron = require('node-cron')

// cron.schedule('*/5 * * * * *', () => backupMongo())

function backupMongo() {
  const child = spawn('mongodump', [
    '--db=' + 'gasvet',
    '--host=' + 'localhost'
  ])
  child.on('exit', (code, signal) => {
    __dirname + '/gasvet'
    if (code)
      console.log('Backup process exited with code ', code);
    else if (signal)
      console.error('Backup process was killed with singal ', signal);
    else
      console.log('Successfully backedup the database')
  })
}
backupMongo()

app.listen(3000, () => {
  console.log('Server is running...' + process.pid)
})