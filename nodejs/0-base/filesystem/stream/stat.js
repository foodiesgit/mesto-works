const fs = require('fs')
//get size with build function
fs.stat('./video.mp4', (err, data) => {
  const size = (data.size/1024/1024).toFixed(2)
  console.log(size)
})