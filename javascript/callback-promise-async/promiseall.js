const p1 = () => Promise.resolve('1,2,3')

const p2 = new Promise((resolve, reject) => {
  resolve('Second promise')
})
const p3 = new Promise((resolve, reject) => {
  setTimeout(() => {
    resolve(fetch('https://jsonplaceholder.typicode.com/users').then(result => result.json()))
  }, 3000)
})
Promise.all([p1(),p2,p3]).then(result =>{
  console.log(result)
}).catch(err => {
  console.log(err)
})