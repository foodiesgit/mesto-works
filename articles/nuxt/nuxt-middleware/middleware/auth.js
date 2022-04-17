export default function ({redirect}) {
  let name = 'mesto'
  if(name === 'mesto'){
    console.log('Hello')
  } else {
   redirect('/account')
  }
}

//or call in nuxt js for all routes