const express = require('express')
const { Nuxt, Builder } = require('nuxt')
const app = express()
const cors = require('cors')
const host = process.env.HOST || '127.0.0.1'
const port = process.env.PORT || 3000

// Import and Set Nuxt.js options
let config = require('../nuxt.config.js')
config.dev = !(process.env.NODE_ENV === 'production')

async function start() {
  const nuxt = new Nuxt(config)
  // Build only in dev mode
  if (config.dev) {
    const builder = new Builder(nuxt)
    await builder.build()
  }

  app.use(cors({credentials: true, origin: true}))
  app.use(express.json({limit: '10mb'}))
  app.use(express.urlencoded({ extended: true, limit: '10mb' }))
  
  app.use(nuxt.render)

  app.set('port', port)
  app.listen(port, host)
}
start()
