const express = require ('express')
const mongoose = require ('mongoose')
const Users = require ('./schema/usersSch.js')
const cors = require ('cors')
const path = require ('path')

const app = express()

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static(path.join(__dirname, 'static')))

//mongo
mongoose.connect('mongodb://localhost/works',{
  useNewUrlParser:true,
  useUnifiedTopology: true,
  useCreateIndex: true
}).then(()=>{console.log('Connected')
}).catch((err)=>{console.log(err)})

app.use((req, res, next) => {
  Object.setPrototypeOf(req, app.request)
  Object.setPrototypeOf(res, app.response)
  req.res = res
  res.req = req
  next()
})

app.get('/', async(req, res) => {
  const result = await Users.find({})
  res.json(result)
})
app.post('/newuser', async(req, res) => {
  await new Users(req.body.newUser).save()
  res.json(res.statusCode)
})

export default {
  path:'/api',
  handler: app
}