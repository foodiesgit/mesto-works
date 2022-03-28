const soccer = require('./soccer.json')
const fs = require('fs')

const getSoccer = (req, res) => {
  try {
    res.writeHead(200, { 'content-type': 'application/json' })
    res.end(JSON.stringify(soccer))
  } catch (error) {
    console.log(error)
  }
}

const findSoccer = (req, res, id) => {
  try {
    const result = soccer[0].results.find(item => item.id === id)
    res.writeHead(200, { 'content-type': 'application/json' })
    res.end(JSON.stringify(result))
  } catch (error) {
    console.log(error)
  }
}

const createSoccer = (req, res) => {
  try {
    const newSoccer = {
      id: 84599045,
      sport_id: 1,
      time: 1575628200,
      time_status: 0,
      league: {
        id: 10036547,
        name: "ahmet Kaya"
      },
      home: {
        id: 10431907,
        name: "Mustafa"
      },
      away: {
        id: 10359159,
        name: "Alcorcon B"
      },
      ss: null,
      our_event_id: 1808139,
      updated_at: 1575582111
    }
    fs.appendFile('./soccer.json', JSON.stringify(newSoccer), 'utf8',(err) => {
      if (!err) {
        console.log('Done...')
      }
    })
    res.writeHead(200, { 'content-type': 'application/json' })
    return res.end(JSON.stringify(newSoccer))
  } catch (error) {
    console.log(error)
  }
}

module.exports = {
  getSoccer,
  findSoccer,
  createSoccer
}