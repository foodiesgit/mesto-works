const fs = require('fs')
let users = [
  {id:1,name:"Mesto"},
  {id:2,name:"Ali"},
  {id:3,name:"Hasan"}
]
fs.appendFile('./users.json', JSON.stringify(users),(err) => {
  if (!err) {
    console.log('Done...')
  }
})

//or
// fs.writeFile('./users.json', JSON.stringify(users),(err) => {
//   if (!err) {
//     console.log('Done...')
//   }
// })
