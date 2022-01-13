// convert collaction to array
// let dom = Array.from(document.all)
// dom.forEach(item => {
//   console.log(item)
// })

// push
// let userspush = ['Mustafa','Baran','Hasan']
// userspush.push('Ali')
// console.log(userspush)

// unshift
// let usersunshift = ['Mustafa','Baran','Hasan']
// usersunshift.unshift('Ali')
// console.log(usersunshift)

// pop
// let userspop = ['Mustafa','Baran','Hasan']
// userspop.pop()
// console.log(userspop)

// shift
// let usersshift = ['Mustafa','Baran','Hasan']
// usersshift.shift()
// console.log(usersshift)

// get last item
// let usersitem = ['Mustafa','Baran','Hasan']
// console.log(usersitem[usersitem.length - 1])

// sort string
// let stringsort = ['Mustafa','Baran','Hasan']
// stringsort.sort()
// console.log(stringsort)

//  stringsort.reverse()
// let reverseString = ['Mustafa','Baran','Hasan']
// reverseString.reverse()
// console.log(reverseString)

// sort number
// let numbersort = [1,2,3].sort((x,y) => {
//   return y-x
// })
// console.log('numbersort----------------------------')
// console.log(numbersort)

//copy array
let original = ['Mustafa','Baran','Hasan']
let copy1 = original.slice()
let copy2 = [...original]
console.log(copy1)
console.log(copy2)