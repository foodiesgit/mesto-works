const slug = (param) => {
  return param
    .trim()
    .normalize('NFD')//for turkish charecters
    .replace(/\s+/g, '-')
    .replace(/[^\w]+/g, ' ')
}


console.log(slug('  Hey, whats\'up mate?  '))