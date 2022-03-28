const http = require('http')
const { getSoccer, findSoccer } = require('./SoccerController')
const IndexController = require('./IndexController')

http.createServer((req, res) => {

  if (req.url === '/api' && req.method === 'GET') {
    IndexController(req, res)
  } else if (req.url === '/api/soccer' && req.method === 'GET') {
    getSoccer(req, res)
  } else if (req.url.match(/\/api\/soccer\/([0-9]+)/) && req.method === 'GET') {
    findSoccer(req, res, req.url.split('/')[3])
  }

}).listen(3000, () => {
  console.log('Server id running...')
})