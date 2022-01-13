const mongoose = require('mongoose')
mongoose.connect("mongodb://localhost:27017/crud", {
    useNewUrlParser: true,
    useUnifiedTopology: true
})
const db = mongoose.connection
db.once('open', () => {
    console.log('Connected...')
})
db.on('error', (err) => {
    console.log(err)
})
module.exports = db