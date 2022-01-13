const letters = 'aeiouAEIOU'
// const  vowel = (param) => param.split('').filter(item => letters.match(item)).length
const  vowel = (param) => param.split('').filter(item => letters.match(item))
console.log(vowel('hello'))