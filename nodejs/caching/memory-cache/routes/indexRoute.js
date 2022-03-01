const Router = require('express').Router()
const cache = require('../middleware/cache')
const request = require('sync-request')
const wrapAsync = require('../middleware/wrapasync.js')
Router.get('/', async(req, res) => {
  res.render('index',{title: 'Home',})
})

//here comes from cache for 5 minutes
Router.get('/users', cache(10), wrapAsync(async(req, res) => {
  const result =  request('get','https://jsonplaceholder.typicode.com/users',{json: {results: 'results'}})
  const final = JSON.parse(result.getBody('utf8'))
  res.render('users', {
    title: 'Users',
    users: final
  })
}))

module.exports = Router