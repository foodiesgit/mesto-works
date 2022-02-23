const express = require('express')
const router = express.Router()
const Users = require('../modules/userSchema')

router.get('/', async(req, res) => {
  const bets = [
    { betid: 1, rate: '2.50' },
    { betid: 2, rate: '3.00' }
  ]
  await Users.updateOne(
    {user: 'm1'},
    {$push:{betsummaries[bets]: bets}}
  )
  const result = await Users.find({user: 'm1'}, {_id: 0, user: 1, betsummaries: 1})
  res.json({ result })
})

module.exports = router