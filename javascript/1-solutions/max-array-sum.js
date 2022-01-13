const test = (param) => Math.max.apply(Math, param.map(item  => {
  return item[0]+item[1]+item[2]
}))
console.log(test([[1, 5,6], [4, 7,8], [3, 9,20], [2, 3,1],[12, 4,5]]))