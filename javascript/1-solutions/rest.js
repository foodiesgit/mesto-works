//rest operator is dynamic prameters
let one =''
let two =''
let three =''
let test = (...args) => {
  one = args[0]
  two = args[1]
  three = args[2][3].name
}
test(1,'hello',[1,2,3,{name:'Mesto'}])
console.log(one, two, three)


//second example
const test2 = (...args) => console.log(args[0])
test2('hello','hi')