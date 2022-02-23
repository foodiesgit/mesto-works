//----------------------------------------------------------filter some exist
let a1 = [1,2,3,4,5,6,7,8,9,10]
let a2 = [8,9,10]
let result1 = a1.filter(item1 => a2.some(item2 => item2 === item1))
console.log(result1)

//----------------------------------------------------------filter some not exist
let result2 = a1.filter(item1 => !a2.some(item2 => item2 === item1))
console.log(result2)