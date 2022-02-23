// convert timestamp(miliseconds) to date
let x = d.getTime()
console.log(d.getTime())
let result = new Date(x)
console.log(result.toLocaleDateString() +' Local Format')
console.log(result.getFullYear() +'-'+ result.getMonth() + 1 +'-'+ result.getDate() +' Special Format')