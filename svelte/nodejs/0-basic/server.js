const express = require('express')
const app = express()
const cors = require('cors')
const path = require('path')
const helmet = require('helmet')
const request = require('sync-request')

app.use(cors())
app.use(helmet())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static(path.resolve(__dirname, 'public')))

app.get('/', (req, res,next) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.get('/api', (req, res, next) => {
  const result = request('GET', 'https://jsonplaceholder.typicode.com/users')
  const final = JSON.parse(result.getBody('utf8'))
  res.json({users:final})
})


app.listen(3000, () => {
  console.log('Server is running...')
})