//-------------------------------------------------------------map with filter
let users = [
  {
      id:1,
      name:'Mesto',
      lastname:'Kaya',
      age:30,
      lang:['EN','TR','GR'],
      friends:[
          {id:1,name:'Baran'},
          {id:2,name:'Kamil'},
          {id:3,name:'Tamer'}
      ]
  },
  {
      id:2,
      name:'Sami',
      lastname:'Demir',
      age:45,
      lang:['EN','FR','GR'],
      friends:[
          {id:1,name:'Reso'},
          {id:2,name:'Faruk'},
          {id:3,name:'Tamer'}
      ]
  },
  {
      id:3,
      name:'Ali',
      lastname:'Arslan',
      age:40,
      lang:['KR','TR','GR'],
      friends:[
          {id:1,name:'Salih'},
          {id:2,name:'Faruk'},
          {id:3,name:'Tamer'}
      ]
  }
]

let mapfilter = users.map(item =>{
  return{
      name:item.name,
      lang:item.lang.filter(item => item === 'EN')
  }
})
console.log(mapfilter)
