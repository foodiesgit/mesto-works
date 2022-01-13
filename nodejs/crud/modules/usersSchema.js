const mongoose = require('mongoose')

const UsersSchema = new mongoose.Schema({
  name: {type: String, required: [true, 'Name required!'], unique:true},
  password: {type: String, required: [true,'Password required!'],maxlength:[10,'Password must be less 10 charecters!']},
  date: {type: Date, default: Date.now()}
})

module.exports = new mongoose.model('Users', UsersSchema)