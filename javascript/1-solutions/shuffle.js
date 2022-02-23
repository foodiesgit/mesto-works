let shuffle = [1, 2, 3, 4, 5, 6, 7, 8, 9];
console.log(shuffle.sort(() => {
  return Math.random() - 0.5
}))