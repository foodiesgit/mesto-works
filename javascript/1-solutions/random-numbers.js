let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
const getNumbers = numbers.sort(() => {
    return Math.random() - 0.5
})

console.log(getNumbers)

//or
const getNumbers2 = Array.from({length:30}, (a,b) => b+1).sort(() => {
  return Math.random() - 0.5
})

console.log(getNumbers2)
