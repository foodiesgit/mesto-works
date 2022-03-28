
const getIndex = (req, res) => {
  try {
    res.writeHead(200, { 'content-type': 'application/json' })
    res.end(JSON.stringify({Index:'Index'}))
  } catch (error) {
    console.log(error)
  }
}

module.exports = getIndex