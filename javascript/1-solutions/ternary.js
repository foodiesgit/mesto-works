
let number = 100
// sample 1
    if(number === 100) console.log('Hello')
// sample 2
    console.log(number === 100 ? 'Yes' :'No')
// sample 3
    let newnumber = number > 100 ? 'Ok' : 'No'
    console.log(newnumber)

//sample 4
// instead of
if (accessible) {
  console.log("It’s open!");
}

// use
accessible && console.log("It’s open!");

//sample 5
// instead of
if (price.data) {
  return price.data;
} else {
  return 'Getting the price’';
}

// use
return (price.data || 'Getting the price');

//sample 6
    const msg = null ?? 'my school';
    // Output: "my school"
    console.log(msg)

    const age = 0 ?? 42;
    console.log(age)
    // Output: 0