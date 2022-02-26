import express from 'express'
const app = express()
import cors from 'cors'
import helmet from 'helmet'
import dotenv from 'dotenv'
import fetch from 'node-fetch'
import redis from 'redis'

dotenv.config()
app.use(helmet())
app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static('static'))

//middleware cach
const cache = async(req, res, next) => {
  try {
    const client = redis.createClient(6379)
    await client.connect()

    client.setEx('msg', 3600, 'Mustafa Kaya')
    const msg = await client.get('msg')
    
    if(msg){
      res.send({msg})
    } else {
      next()
    }
  } catch (error) {
    console.error(error)
  }
}
app.get('/', cache,(get, res) => {
  res.send('Hello')
})

app.listen(3000, () => {
  console.log('Server is running...')
})

