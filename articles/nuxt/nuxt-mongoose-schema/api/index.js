const express = require('express')
const app = express()
const indexRouter = require('./routers/indexRouter')
const db = require('./modules/db')
app.use((req, res, next) => {
  Object.setPrototypeOf(req, app.request)
  Object.setPrototypeOf(res, app.response)
  req.res = res
  res.req = req
  next()
})
// Create express router
app.use('/', indexRouter)

app.use((error, req, res, next) => {
  console.log({ error })
})

// Export the server middleware
export default {
  path: '/api',
  handler: app
}