const express = require('express')
const router = express.Router()


router.get('/', (req, res) => {
  try {
    res.jso({ message: 'Hello' })
  } catch (error) {
    res.json({
      errorMessge: 'There is no json'
    })
  }
})

module.exports = router