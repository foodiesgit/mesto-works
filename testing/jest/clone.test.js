const cloneArray = require('./clone')
test('properly clone an array', () => {
  const array = [1, 2, 3]
  expect(cloneArray(array)).toEqual(array)
})