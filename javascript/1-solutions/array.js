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
// let original = ['Mustafa','Baran','Hasan']
// let copy1 = original.slice()
// let copy2 = [...original]
// console.log(copy1)
// console.log(copy2)

// concat
// let arr = [1,2,3]
// let usersfind = ['Mustafa','Baran','Hasan']
// console.log(usersfind.concat(arr))

//--------------------------------------
// let array1 = ['node','vue','mongo']
// let array2 = ['vuetify','mysql','nuxt']


// concat all
  // console.log(...array1,...array2)

// concat all and with new values
  // let array3 = [...array1,...array2,'javascript','mongoose','pm2']
  // console.log(array3)

// with concat
// console.log(array1.concat(array2))

// concat
// let arr = [1,2,3]
// let usersfind = ['Mustafa','Baran','Hasan']
// console.log(usersfind.concat(arr))

// const test = (param) => Math.max(...param)
// console.log(test([1,20,33]))

// const test1 = (param) => Math.max(...param.flat())
// console.log(test1([[1, 5,6], [4, 7,8], [3, 9,20], [2, 3,1],[12, 4,5]]))

// const test = (param) => Math.max(...[].concat(...param))
// console.log(test([[12,45,75], [54,45,2],[23,54,78,2]]))