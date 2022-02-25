let users = [
  {id:1,name:'Mesto'},
  {id:2,name:'Sami'},
  {id:3,name:'Hamit'}
]
userlist = () => {
  setTimeout(() => {
    console.log(users)
  }, 1000)
}
addUser = (id, name, callback) => {
  setTimeout(() => {
    users.push({id:id,name:name})
    callback()
  }, 2000)
}
addUser(4,'Selim',userlist)