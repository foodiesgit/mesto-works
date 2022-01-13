const test = (param) => param.map(item => item[0].toUpperCase() + item.slice(1))
console.log(test(['html', 'css', 'javascript', 'python']))