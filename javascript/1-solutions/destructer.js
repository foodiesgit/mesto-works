
// array destructer
let list = ['VueJs','Javascript','Mysql','Nodejs']
let [x,,y] = list
console.log(x,y)

// function destructer
const listFun = () => ['VueJs','Javascript','Mysql','Nodejs']
let [a,b] = listFun()
console.log(a,b)

// object destructer
let list2 = {id:1,name:'Mesto',age:45}
let {id,name} = list2
console.log(id,name)


//args
const  auth = {
  name:'Mesto',
  pass:'9090',
  admin:true
}
const {admin, ...restOfObject} = auth
console.log(restOfObject)