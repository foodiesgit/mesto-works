module.exports =  class users{
  constructor (name,age) {
    this.name = name
    this.age = age
  }
  showUser () {
    return `${this.name} ${this.age}`
  }
}