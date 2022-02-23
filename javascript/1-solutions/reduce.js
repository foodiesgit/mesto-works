// reduce
let num = [1,2,3,4,5]
let reducemet = num.reduce((acc, item)=>{
  return acc + item
},0)
console.log(reducemet)

//shorthand
let rs = num.reduce((acc, item) => acc + item ,0)
console.log(rs)