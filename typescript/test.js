var fullName = 'Mustafa Kaya';
console.log(fullName);
var langs = ['Javascript', 'Css', 'Html'];
console.log(langs);
//dynamic type if you need
var langs2 = ['Javascript', 'Css', 'Html', 200, true]; //any can contain all types
console.log(langs2);
var fullName = function (name, lastName) {
    return name + ' ' + lastName;
};
console.log(fullName('Mustafa', 'Kaya'));
