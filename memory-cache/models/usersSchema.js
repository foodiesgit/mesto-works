const mongoose = require('mongoose')

const UsersSchema = new mongoose.Schema({
  name: {type: String, required: true},
  password: {type: String, required: true},
  // date: {type: Date, default: Date.now()}
})

module.exports = new mongoose.model('Users', UsersSchema)