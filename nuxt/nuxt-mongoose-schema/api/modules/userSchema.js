const mongoose = require('mongoose')

const betsSC = new mongoose.Schema({
  betid:{type: Number, required: true, default: 0},
  sumid:{type: Number, required: true, default: 0},
  code:{type: Number, required: true},
  user:{type: String, required: true},
  admin:{type: String, required: true},
  superadmin:{type: String, required: true},
  matches:{type: String, required: true},
  games:{type: String, required: true},
  options:{type: String, required: true},
  rate:{type: Number, required: true},
  state:{type: String, required: true},
  stream:{type: String, required: true},
  date:{type: Date, required: true, default: Date.now()},
  scoreid:{type: Number, required: true},
  eventtime:{type: String, required: true},
  score:{type: String}
}, {strict: false})

const betsummariesSC = new mongoose.Schema({
  sumid:{type: Number, required: true, default: 0},
  date:{type: Date, required: true, default: Date.now()},
  betscount:{type: Number, required: true},
  betscountremain:{type: Number, required: true},
  amount:{type: Number, required: true},
  rate:{type: Number, required: true},
  earn:{type: Number, required: true},
  baseearn:{type: Number, required: true},
  owner:{type: String, required: true},
  state:{type: String, required: true},
  userpay:{type: String, required: true, default:'no'},
  adminpay:{type: String, required: true, default: 'no'},
  stream:{type: String, required: true},
  woncount:{type: Number, required: true, default: 0},
  lostcount:{type: Number, required: true, default: 0},
  bets: [betsSC]
}, {strict: false})

const usersSC = new mongoose.Schema({
  user:{type: String, required: true, unique: true},
  nick:{type: String, required: true, unique: true},
  pass:{type: String, required: true},
  admin:{type: String, required: true},
  superadmin:{type: String, required: true},
  role:{type: String, required: true},
  credit:{type: Number, default: 0},
  creditremain:{type: Number, default: 0},
  userlimit:{type: Number, default: 0},
  usedlimit:{type: Number, default: 0},
  date:{type: Date, default: Date.now},
  state:{type: String, default: 'aktif'},
  payment:{type: Date},
  usercomission:{type: Number, default: 40},
  personcomission:{type: Number, default: 5},
  fakelogin:{type: Number, default: 0},
  logincount:{type: Number, default: 5},
  logincheck:{type: String, default: 'passive'},
  multilogin:{type: Boolean, default: true},
  sessioncount:{type: Number, default: 0},
  resetaccount:{type: Date, default: Date.now},
  autopay:{type: Number, default: 0},
  usercancelbet:{type: Number, default: 15},
  personcancelbet:{type: Number, default: 15},
  betsummaries: [betsummariesSC]
})

module.exports = mongoose.model('users', usersSC)