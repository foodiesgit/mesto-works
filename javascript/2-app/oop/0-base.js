class Employees {
  constructor(name, age, salery){
    this.name = name,
    this.age = age,
    this.salery = salery
  }
  showInfos() {
    console.log(this.name, this.age, this.salery)
  }
}
const emp1 = new Employees('Mesto',40, 5000)
emp1.showInfos()
console.log(emp1.age)