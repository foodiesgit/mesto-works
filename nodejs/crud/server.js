const express = require('express')
const app = express()
const db = require('./modules/db')
const session = require('express-session')
const MemoryStore = require('memorystore')(session)
const path = require('path')
const cors = require('cors')
const auth = require('./middleware/auth')

const homeRouter = require('./routes/homeRouter.js')
const authRouter = require('./routes/authRouter.js')
const usersRouter = require('./routes/usersRouter.js')

app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: false}))
app.use(express.static(path.join(__dirname, 'static')))

// app.set('views', path.join(__dirname, 'templates'))//custom folder
app.set('view engine','pug')//default

app.use(require('connect-flash')())
app.use(function (req, res, next) {
  res.locals.messages = require('express-messages')(req, res)
  next()
})

app.locals.moment = require('moment')

app.use(session({
  secret: 'admin',
  resave: true,
  saveUninitialized: true,
  cookie: { maxAge: 24 * 60 * 60 * 1000 },
  httpOnly: true,//only transmit cookie over https
  secure: true,//prevents client side js reading the cookies
  store: new MemoryStore({
    checkPeriod: 86400000
  })
}))

app.use('/', homeRouter)
app.use('/auth', authRouter)
app.use('/admin', auth, usersRouter)

app.use((req, res, next) => {
  res.render('error')
  next()
})

//listen server
app.listen(process.env.PORT || 3000, () => {
  console.log('Server listen...')
})