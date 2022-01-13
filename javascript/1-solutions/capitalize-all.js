const  test = (param) => param.split(' ').map(item => item[0].toUpperCase() + item.slice(1)).join(' ')
console.log(test('css html javascript'))

const  test2 = (param) => param.map(item => item[0].toUpperCase() + item.slice(1))
console.log(test2(['css','html']))

const  test3 = (param) => param.flat().map(item => item[0].toUpperCase() + item.slice(1))
console.log(test3([['css','html'],['javascript','python']]))