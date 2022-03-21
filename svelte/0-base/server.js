const express = require('express')
const app = express()
const cors = require('cors')
const helmet = require('helmet')
const path = require('path')

app.use(cors())
app.use(helmet())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static(path.join(__dirname, 'public')))

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public/index.html'));
})

app.listen(3000, () => {
  console.log('Server is running...')
})