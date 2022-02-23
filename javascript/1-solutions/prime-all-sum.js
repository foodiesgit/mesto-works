const test = (param) => {
  let store = [],primes = [],total=0
  for(let i = 2; i<=param;i++){
    if(!store[i]){
      primes.push(i)
      total+=i
      for(let j = i;j<=param;j+=i){
        store[j] = true
      }
    }
  }
  return [primes,total]
}
console.log(test(10))


//or
// const isPrime = (num) => {
//   if(num < 2) return false
//   for (let i = 2; i < num; i++) {
//     if(num % i === 0){
//       return false
//     }
//   }
//   return true
// }
// let prime = []
// for(let i = 0; i < 10; i++) {
//   if(isPrime(i)){
//     prime.push(i)
//   }
// }
// console.log(prime)