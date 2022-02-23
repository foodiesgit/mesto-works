const test = (param) => {
  let store = [],primes = [],total=0
  for(let i = 2; i<=param.length;i++){
    if(!store[i]){
      primes.push(i)
      total+=i
      for(let j = i;j<=param.length;j+=i){
        store[j] = true
      }
    }
  }
  return [primes,total]
}
console.log(test(Array.from({length: 20},(a,b) => b+1)))
