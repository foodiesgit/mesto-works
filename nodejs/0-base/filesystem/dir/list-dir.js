const os = require('os')
const fs = require('fs')
const path = require('path')
// const target = path.join('C:')
// const target = path.join('public/')//get dirs
const target = path.join('public/new/')//et files
fs.readdir(target, (err, dirs) => {
  if(err){
    console.error(err);
  }
    dirs.forEach(item => {
      console.log(item)
    })
})