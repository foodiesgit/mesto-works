const express = require('express')
const mongoose = require('mongoose')
const user = require('./schema/usersSC')
const app = express()

// mongo callback
mongoose.connect('mongodb://localhost/gasvet',{
  useNewUrlParser:true,
  useUnifiedTopology: true,
  useFindAndModify: false,
  useCreateIndex: true
}).then(()=>{
  console.log('Connected')
}).catch((err)=>{console.log(err)})


app.get('/', (req, res) => {
  user.find({},(err, result) =>{
    if (!err) {
      res.json(result)
    }
  })
})
app.post('/newuser', (req, res) => {
  let newuser = new user({
    name:req.body.newuser.name,
    lastname:req.body.newuser.lastname,
    age:req.body.newuser.age
  })
  try {
    newuser.save(() =>{
      res.json(res.statusCode)
    })
  } catch (err) {console.log(err)}
})
app.put('/edituser',(req,res) =>{
  user.findByIdAndUpdate(req.body.id, {name:req.body.edituser}, (err) =>{
    if (!err) {
      res.json(res.statusCode)
    }
  })
})
app.post('/deleteuser',(req,res) =>{
  user.findByIdAndRemove(req.body.id, (err) =>{
    if (!err) {
      res.json(res.statusCode)
    }
  })
})


//mongo async
// const connectMN = async () => {
//   const client = await  mongoose.connect('mongodb://localhost/gasvet',{
//     useNewUrlParser:true,
//     useUnifiedTopology: true,
//     useFindAndModify: false,
//     useCreateIndex: true
//   })
//   return client
// } 
// connectMN()

// app.get('/', async (req, res) => {
//   await user.find({},(err, result) =>{
//     if (!err) {
//       res.json(result)
//     }
//   })
// })

// app.post('/newuser', async (req, res) => {
//   let newuser = new user({
//     name:req.body.newuser.name,
//     lastname:req.body.newuser.lastname,
//     age:req.body.newuser.age
//   })
//   try {
//     await newuser.save(() =>{
//       res.json(res.statusCode)
//     })
//   } catch (err) {console.log(err)}
// })
// app.put('/edituser', async (req,res) =>{
//   await user.findByIdAndUpdate(req.body.id, {name:req.body.edituser}, (err) =>{
//     if (!err) {
//       res.json(res.statusCode)
//     }
//   })
// })
// app.post('/deleteuser', async (req,res) =>{
//   await user.findByIdAndRemove(req.body.id, (err) =>{
//     if (!err) {
//       res.json(res.statusCode)
//     }
//   })
// })

export default {
  path:'/api',
  handler: app
}