const express = require('express')
const router = express.Router()
const {indexController, adminController} = require('./controllers')


router.get('/', indexController)
router.get('/admin', adminController)


module.exports = router