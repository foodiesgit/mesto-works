const soccer = require('./soccer.json')

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

module.exports = {
  getSoccer,
  findSoccer
}