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
        success: 1,
        pager: {
            page: 10,
            per_page: 50,
            total: 924
        },
        results: [
            {
                id: "84594890",
                sport_id: 1,
                time: 1575588600,
                time_status: 0,
                league: {
                    id: 10037445,
                    name: "Filiz Kaya"
                },
                home: {
                    id: 10360110,
                    name: "Mesto"
                },
                away: {
                    id: 10360103,
                    name: "Cerro Largo"
                },
                ss: null,
                our_event_id: 2085945,
                updated_at: 1575582017
            }
        ]
    }
    fs.readFile('./soccer.json', function (err, data) {
      var final = JSON.parse(data)
      final.push(newSoccer)
      fs.writeFile("./soccer.json", JSON.stringify(final), 'utf-8', (err) => {
        if (!err) {
          console.log('Done')
        }
      })
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