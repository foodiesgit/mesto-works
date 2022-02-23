
const indexController = (req, res) => {
  res.json('Hello Index Controller!')
}
const adminController = (req, res) => {
  res.json('Hello Admin Controller!')
}

module.exports = {
  indexController,
  adminController
}