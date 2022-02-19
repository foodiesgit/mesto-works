const mongoose = require('mongoose')

const UsersSchema = new mongoose.Schema({
  name: {type: String, required: [true, 'Name required!'], unique:true},
  password: {type: String, required: [true,'Password required!'],minlength:[4,'Password must be less 4 charecters!']},
  salery: {type: Number, required: [true,'Salery required!'],minlength:[4,'Salery must be less 4 charecters!']},
  language: [{type:String, reuired: true}],
  messagesCount: {type: Number},
  created_at: {type: Date, default: Date.now()}
})

module.exports = new mongoose.model('Users', UsersSchema)