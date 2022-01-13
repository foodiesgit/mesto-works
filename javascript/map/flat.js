let arr1 = [[1,2,3],['a','b','c'],['a1','b2','b3']]
let arr2 = [1,2,3,4,5].flatMap(item => [item, item*2])
let arr3 = [[1,2,3],[4,5,6],['a','b','c']]


console.log(arr1.flat(Infinity))
console.log(arr2)
console.log(arr3.flat())