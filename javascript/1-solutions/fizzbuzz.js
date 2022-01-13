//find the sum of all multiples of 3 or 5 below 100.
//100 kadar olan sayilarin 3'e ve 5'e tam bolunenleri bulun

for (let i = 0; i <= 100; i++) {
  if(i % 3 === 0 || i % 5 == 0){
    console.log(i)
  }
}