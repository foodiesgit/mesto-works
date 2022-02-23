function primeAll(param){
  let store  = [], primes = []
  for (i = 3; i <= param; ++i) {
    if (!store [i]) {
      primes.push(i)
      for (j = i ; j <= param; j += i) {
        store[j] = true
      }
    }
  }
  return primes
}
console.log(primeAll(10))


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