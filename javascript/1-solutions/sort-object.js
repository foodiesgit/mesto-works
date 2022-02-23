const objectArr = [ 
  { firstName: 'Lazslo', lastName: 'Jamf'     },
  { firstName: 'Pig',    lastName: 'Bodine'   },
  { firstName: 'Pirate', lastName: 'Prentice' }
];
objectArr.sort((a, b) => a.lastName.localeCompare(b.lastName));