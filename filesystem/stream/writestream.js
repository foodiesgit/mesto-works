const fs = require('fs')
const rs = fs.createReadStream('./video.mp4')
const ws = fs.createWriteStream('./newvideo.mp4')

rs.on('data',(chunk)=>{
  console.log(chunk.length)
})
rs.on('end',()=>{
  console.log('Done...')
})
rs.pipe(ws)
ws.on('finish',()=>{
  console.log('New video created!')
})