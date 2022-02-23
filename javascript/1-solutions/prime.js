let test = (param)=>{
  let state = true
    for (let item = 3; item < param; item++) {
      if (param % item == 0) {
       state = false
       break
      }
    }
    return state ? 'prime'  : 'not prime'
}
console.log(test(11))

 
