const Router = require('express').Router()
const wrapAsync = require('../middleware/wrapasync.js')

const Cryptr = require('cryptr')
const cryptr = new Cryptr('secret')
const redis = require('redis')
const request = require('sync-request')

const client = redis.createClient(6379)
client.connect()
client.on('connect', () => {
  console.log('Connected to redis...')
})

Router.get('/users', wrapAsync(async(req, res) => {
  try{
    const users = await client.get('users')
    if(users) {
      console.log("User successfully retrieved from cache");
      const result = JSON.parse(users);
      res.render('users', {
        title: 'Users',
        users:result
      })
    } else {
      const result =  request('get','https://jsonplaceholder.typicode.com/users?username=Bret',{json: {results: 'results'}})
      const final = JSON.parse(result.getBody('utf8'))
      client.setEx('users', 10, JSON.stringify(final));
      console.log("User successfully retrieved from the API");
      res.render('users', {
        title: 'Users',
        users:final
      })
    }
  }catch(err) {
    req.flash('danger',err)
    res.render('users')
  }
}))

module.exports = Router