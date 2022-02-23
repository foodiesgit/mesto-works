let d = new Date()
console.log(d)
console.log(`String ${d.toString()}`)
console.log(`DateString ${d.toDateString()}`)
console.log(`LocalString ${d.toLocaleString()}`)
console.log(`LocalDateString ${d.toLocaleDateString()}`)
console.log(`LocalTimeString ${d.toLocaleTimeString()}`)
console.log(`Now ${Date.now()}`)
console.log(`Year ${d.getFullYear()}`)
console.log(`Month ${d.getMonth()+ 1}`)
console.log(`DayOWeek ${d.getDay()}`)
console.log(`Day ${d.getDate()}`)

//new format
const fr = Intl.DateTimeFormat('tr-TR')
console.log(fr.format(new Date()))
