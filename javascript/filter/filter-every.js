let a1 = [1,2,3,4,5,6,7,8,9,10]
let a2 = [8,9,10]
//----------------------------------------------------------filter every exist
let result3 = a1.filter(item1 => !a2.every(item2 => item2 !== item1))
console.log(result3)
//-----------------------------------------------------------filter every not exist
let result4 = a1.filter(item1 => a2.every(item2 => item2 !== item1))
console.log(result4)
//-----------------------------------------------------------filter some
let books = [
  {name:'css',price:400},
  {name:'html',price:500},
  {name:'javascript',price:600},
  {name:'Nodejs',price:600}
]
let books2 = [
  {name:'css',price:300},
  {name:'html',price:500},
  {name:'javascript',price:700},
  {name:'Nodejs',price:600}
]
let tt = books.filter(item1 => books2.some(item2 => (item2.price === item1.price)))
console.log(tt)