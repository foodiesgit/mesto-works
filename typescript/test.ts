let fullName: string = 'Mustafa Kaya';
console.log(fullName)

let langs: string = ['Javascript','Css','Html'];
console.log(langs)

//dynamic type if you need
let langs2: any = ['Javascript','Css','Html',200, true];//any can contain all types
console.log(langs2)

const fullName = (name:string, lastName:string) : string => {
  return name +' '+ lastName
}
console.log(fullName('Mustafa', 'Kaya'))