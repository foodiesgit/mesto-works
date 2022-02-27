import express from 'express'
const app = express()
import cors from 'cors'
import helmet from 'helmet'
import dotenv from 'dotenv'
import redis from 'redis'

dotenv.config()
app.use(helmet())
app.use(cors())
app.use(express.json())
app.use(express.urlencoded({extended: true}))
app.use(express.static('static'))

app.get('/', async(get, res) => {
  try {
    const client = redis.createClient(6379)
    await client.connect()
    
    client.setEx('users', 3600, 'Mustafa Kaya')
    const users = await client.get('users')
    //or with callback
    // client.setEx('users',3600, 'mesto', (err, data => {
    //   if(!err){
    //     res.send(users)
    //   }
    //   console.error(err)
    // }))
 
    res.send(users)
  } catch (error) {
    console.error(error)
  }
})

app.listen(3000, () => {
  console.log('Server is running...')
})

