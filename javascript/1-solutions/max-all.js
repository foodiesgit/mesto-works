const test = (param) => Math.max(...param)
console.log(test([1,2,3,4]))

const test1 = (param) => Math.max(...param.flat())
console.log(test1([[12,45,75], [54,45,2],[23,54,78,2]]))

//or
const test2 = (param) => Math.max(...[].concat(...param))
console.log(test2([[12,45,75], [54,45,2],[23,54,78,2]]))