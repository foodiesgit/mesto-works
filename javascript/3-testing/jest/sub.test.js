const sub = require('./sub')
test('properly subs two numbers', () => {
  expect(sub(3, 2)).toBe(1)
})