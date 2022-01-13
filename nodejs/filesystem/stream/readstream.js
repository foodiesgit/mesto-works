const fs = require('fs')
const rs = fs.createReadStream('./video.mp4')

rs.on('data',(chunk)=>{
  console.log('read...')
})
rs.on('end',()=>{
  console.log('Done...')
})