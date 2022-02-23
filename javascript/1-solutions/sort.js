const sortLetter = (param) => param.split('').sort((a, b) => a > b ? 1 : -1)
console.log(sortLetter('mesto'))