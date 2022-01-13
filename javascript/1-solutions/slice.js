const users = ([
  {name:'mesto', age:50},
  {name:'ali', age:30},
  {name:'kenan', age:40},
  {name:'faruk', age:50}
])
const test = users.slice(1, users.length-1)
test.forEach(item => {
  console.log(item.name)
});