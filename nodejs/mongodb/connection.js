const express = require('express')
const app = express()
const mongoose = require('mongoose')
app.use(express.json())
app.use(express.urlencoded({extended: true}))

const db = mongoose.connect('mongodb://localhost:27017/works',{
  useCreateIndex: true,
  useFindAndModify: true,
  useNewUrlParser: true,
  useUnifiedTopology: true
})
.then(() => console.log('Connected'))
.catch((err) => console.error(err))

//or async
// const db = async () => {
//   try{
//     const conn = await mongoose.connect('mongodb://localhost:27017/works',{
//       useCreateIndex: true,
//       useFindAndModify: true,
//       useNewUrlParser: true,
//       useUnifiedTopology: true
//     })
//   }catch(err){
//     console.log(err)
//     process.exit(1)
//   }
// }

const port = process.env.PORT || 3000
const host = process.env.PORT || '127.1.0.0'

const usersSchema = new mongoose.Schema({},{strict: false})
const Users = mongoose.model('users', usersSchema)

app.get('/', async(req, res) => {
  const result = await Users.find({})
  res.json(result)
})

app.set('port', port)
app.listen(port, host => {
  console.log('Server is running...')
})
