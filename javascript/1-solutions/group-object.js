this.leagues =  final.reduce(function (acc, obj) {
  var key = obj['leagueid'];
  if (!acc[key]) {
    acc[key] = [];
  }
  acc[key].push(obj);
  return acc;
}, {});