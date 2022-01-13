const auth = (req, res, next) => {
  if(req.session.auth){
    next()
  }else{
    res.redirect('/auth/login')
  }
}

module.exports = auth