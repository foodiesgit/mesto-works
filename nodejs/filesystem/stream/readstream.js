const fs = require('fs')
const rs = fs.createReadStream('./video.mp4')

let size = 0
rs.on('data',(chunk)=>{
  console.log(chunk)
  console.log(chunk.length)
  console.log('read...')
  size+=chunk.length
})
rs.on('end',()=>{
  console.log('Done...')
  console.log('Size...' + (size/1024/1024).toFixed(2))
})
