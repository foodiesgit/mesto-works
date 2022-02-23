let test = (param) => param.filter(item => item % 2 == 0)
console.log(test(Array.from({length: 20},(a,b) => b+1)))

//rest operator is dynamic prameters
// let test = (...args)=>{
//   let total = []
//   for (let item in args) {
//     if (item % 2 == 0) {
//       total.push(item)
//     }
//   }
//   return total
// }
// console.log(test(1,2,3,4,5,6,7,8,9))
