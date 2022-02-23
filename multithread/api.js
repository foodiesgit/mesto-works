const request = require('sync-request')
function getApi() {
  const result = request('GET', 'https://jsonplaceholder.typicode.com/users')
  return JSON.parse(result.getBody('utf8'))
}

process.on('message', (message) => {
  if (message === 'start') {
    const sum = getApi()
    process.send(sum)
  }
})