const Router = require('express').Router()
const Users =  require('../models/usersSchema.js')
const cache = require('../middleware/cache')

Router.get('/', async(req, res) => {
  res.render('index',{title: 'Home',})
})

//here comes from cache for 5 minutes
Router.get('/users', cache(300), async(req, res) => {
  const allUsers = await Users.find({})
  res.render('users', {
    title: 'Users',
    users: allUsers
  })
})

Router.get('/detailuser/:id', async(req, res) => {
  const detailUser = await Users.findById(req.params.id)
  res.render('detailuser', {
    title: 'Details',
    users: detailUser
  })
})

Router.get('/adduser', async(req, res) => {
  res.render('adduser',{title: 'Add user',})
})

Router.post('/adduser', async(req, res) => {
  const users = req.body
  if(req.body.name.length > 3 && req.body.password.length > 3){
    const newUser = await new Users(users)
    newUser.save()
    .then(() => {
      req.flash('success','Saved Success!')
      res.redirect('/adduser')
    }).catch((err) => {
      console.log(err)
    })

  }else{
    req.flash('danger','Some Error!')
    res.redirect('/adduser')
  }
})

Router.get('/edituser/:id', async(req, res) => {
  const editUser = await Users.findById(req.params.id)
  res.render('edituser', {
    title: 'Edit User',
    users:editUser
  })
})

Router.post('/edituser/:id', async(req, res) => {
  if(req.body.name.length > 3 && req.body.password.length > 3){
    await Users.updateOne(
      {_id:req.params.id},
      { $set: { name: req.body.name, password: req.body.password } }
    ).then(() => {
      req.flash('success','Edit Success!')
      res.redirect('/edituser/'+ req.params.id)
    }).catch((err) => {
      console.log(err)
    })
  }else{
    req.flash('danger','Some Error!')
    res.redirect('/edituser/'+ req.params.id)
  }
})

Router.get('/deleteuser/:id', async(req, res) => {
  await Users.deleteOne({_id: req.params.id})
  .then(() => {
    res.redirect('/users')
  }).catch((err) => {
    console.log(err)
  })
})

module.exports = Router