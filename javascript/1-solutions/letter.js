const letter = (param) => {
  if(isNaN(param)){
    if(param.match(/[a-zA-Z]/)){
      console.log('String')
    } else {
      console.log('Number')
    }
  } else {
    console.log('Please type a string!')
  }
}
letter('0909')