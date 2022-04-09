const fs = require('fs')
fs.writeFileSync('./test.txt', 'Hello dear!', (err) => {
  if(!err){
    console.log('Done')
  }
})