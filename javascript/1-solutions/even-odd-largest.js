let test = (param) => Math.max(...param.filter(item => item % 2 == 0))
console.log(test(Array.from({length:20}, (a,b) => b+1)))