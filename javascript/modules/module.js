//you can import this function wtih any name
export default function test() {
  return 'Hello Test2'
} 

//you must import this function with the same name
export function test1() {
  return 'Hello Test'
} 

//you must import these function with the same names
let test2 = name => 'Your name: ' + name
let test3 = lastname => 'Your lastname: ' + lastname

export {
  test2,
  test3
}