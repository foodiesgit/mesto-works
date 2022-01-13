const firstLetter = (param) => param.replace(/[a-z]/,'$')
console.log(firstLetter('nHtml'))


const firstLetter2 = (param) => param.replace(param.charAt(0),'$')
console.log(firstLetter2('nHtml'))