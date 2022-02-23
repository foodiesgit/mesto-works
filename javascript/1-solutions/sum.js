//rest operator is dynamic prameters
let sum = (...args)=>{
  return args.reduce((x, y) => x + y)
}
console.log(sum(1,2,3,4,5,6,7,8,9))