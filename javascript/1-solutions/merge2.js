// merge object
let obj1 = { name: 'Mustafa', age: 30 }
let obj2 = { city: 'Amed', country: 'Kurdistan' }
let merge = {...obj1,...obj2}
console.log(merge)

// concat
let arr = [1,2,3]
let usersfind = ['Mustafa','Baran','Hasan']
console.log(usersfind.concat(arr))