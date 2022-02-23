 // return only one and first object
 const f = data[0].results.find(item => item.home.name === 'Gremio')
 if (f !== undefined) {//check key must be undefined
     console.log(f)
 } else {
     console.log('No date!')
 }
 // findindex return only one and first object position
 const fi = data[0].results.findIndex(item => item.home.name === 'Gremio')
 if (fi !== undefined) {//check key must be undefined
     console.log('Founded position' + ' = ' + fi)
 } else {
     console.log('No date!')
 }