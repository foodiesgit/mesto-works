//-----------------------------------inherints
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

//child or base class
class Admins extends Employees {
  constructor(name, age, salery, role, task){
    super(name, age, salery),
    this.role = role,
    this.task = task
  }
  showInfos() {//override showInfos (from Employees)
    console.log(this.name, this.age, this.salery, this.role, this.task)
  }
}

const adm1 = new Admins('Mesto',40, 5000, 'Aministrator', 'Testing')
adm1.showInfos()