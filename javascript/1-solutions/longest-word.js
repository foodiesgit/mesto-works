function test(param) {
  let onlyWords = param.match(/[a-z-A-Z-0-9]+/g)
  .sort((a, b) => b.length - a.length)
  return onlyWords.filter((item) => item.length === onlyWords[0].length)
}
console.log(test("Hello Mustafa!How are you today?"))
