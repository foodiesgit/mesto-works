const polindrome = (param) => {
  let result = param.split('').reverse().join('')
  if(result === param){
    return result
  }
  return 'Not match!'
}

console.log(polindrome('mesto'))