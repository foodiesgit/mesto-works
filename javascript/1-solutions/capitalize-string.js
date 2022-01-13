const test = (param) => param.split(' ')
.map(item => item[0].toUpperCase() + item.slice(1))
.join(' ')
console.log(test('mesto is software worker'))

//or
// const test = (param) => param.replace(/\b[a-z]/gi,(item) => item[0].toUpperCase())
// console.log(test('mesto is software worker'))