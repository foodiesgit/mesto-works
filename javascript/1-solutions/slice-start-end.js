let test = (param) => param.length < 3 ? param : param.slice(0,3) + param.slice(-3)
console.log(test('Mesto Kaya'))