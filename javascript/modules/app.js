// import anyName from './module.js'//from default export
// import {test1, test2, test3} from './module.js'//from only export

// console.log(anyName())
// console.log(test1())
// console.log(test2('Mesto'))
// console.log(test3('Kaya'))

//use for all export type (not default)
// import * as modules from './module.js'

// console.log(modules.test1())
// console.log(modules.test2('Mesto'))
// console.log(modules.test3('Kaya'))

//use as promise
document.getElementById('get-promise').addEventListener('click', () => {
  const util = () => import('./module.js')
  util().then(data => {
    console.log(data)
    
    document.getElementById('name').innerText = data.test2('Mesto')
    document.getElementById('lastname').innerText = data.test3('Kaya')
  })

})

//use as async
document.getElementById('get-async').addEventListener('click', async() => {
  const result = await import('./module.js')
  console.log(result)

  document.getElementById('name').innerText = result.test2('Mesto')
  document.getElementById('lastname').innerText = result.test3('Kaya')
})