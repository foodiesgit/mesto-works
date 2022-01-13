//between to dates as Day
let olddate = new Date('2021-04-10 24:00:00')
let current = Date.now()
let result = ((current - olddate.getTime())/60000/60/24).toFixed(0)
console.log(result +' Days')