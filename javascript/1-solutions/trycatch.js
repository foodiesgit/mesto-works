let division = (x,y) =>{
  try {
    let n1 = x
    let n2 = y
    alert(n1 / n2)
  } catch (error) {
    alert(error)
  }
 }
 let division2 = (x,y) =>{
  try {
    let n1 = x
    let n2 = y
    if (n2 === 0) throw Error('Sifira bolunemez!')//custom message
    alert(n1 / n2)
  } catch (error) {
    alert(error)
  } finally{
    alert('Isem bitti!')
  }
 }