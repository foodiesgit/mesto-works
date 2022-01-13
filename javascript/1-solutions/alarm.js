const test = (wakeTime, timer) => {
  let d = new Date()
  if(wakeTime >= Date.now() && timer){
    console.log('Wakeup please!')
  }else{
    clearInterval(alarmLoop)
    return 'Early to wakeup.Keep sleep!'
  }
}
const alarmLoop = setInterval(() => {
  console.log(test(new Date('2021-11-14 13:28:00'), true))
})