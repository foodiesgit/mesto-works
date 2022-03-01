const Router = require('express').Router()
const cache = require('../middleware/cache')
const request = require('sync-request')
const wrapAsync = require('../middleware/wrapasync.js')

Router.get('/', (req, res) => {
  res.render('index',{title: 'Home',})
})

Router.get('/users', cache(10), wrapAsync((req, res) => {
  const result =  request('get','https://jsonplaceholder.typicode.com/users',{json: {results: 'results'}})
  const final = JSON.parse(result.getBody('utf8'))
  res.render('users', {
    title: 'Users',
    users: final
  })
}))

module.exports = Router