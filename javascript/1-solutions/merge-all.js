const test = (param) => Math.max(...param)
console.log(test([1,20,33]))

const test1 = (param) => Math.max(...param.flat())
console.log(test1([[1, 5,6], [4, 7,8], [3, 9,20], [2, 3,1],[12, 4,5]]))

//or
const test = (param) => Math.max(...[].concat(...param))
console.log(test([[12,45,75], [54,45,2],[23,54,78,2]]))