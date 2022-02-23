const test = (param) => param.split('').reverse().join('')
console.log(test('css'))

const test1 = (param) => param.reverse()
console.log(test1(['css','Abc']))

const test2 = (param) => param.flat().reverse()
console.log(test2([['css','abc'],['html','abc']]))