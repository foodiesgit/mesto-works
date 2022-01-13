const router = require('express').Router()
const path = require('path')

router.get('/', function (req, res) {
  res.status(200).sendFile(path.join(__dirname, '../views/index.html'))
})
router.get('/home', function (req, res) {
  res.status(200).sendFile(path.join(__dirname, '../views/home.html'))
})

module.exports = router