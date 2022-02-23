const express = require('express')
const router = express.Router()


router.get('/', (req, res, next) => {
  res.jso({message:'Hello'})
})

module.exports = router