<script>
  let counter = 0

  $:newValu = counter * 2
  $:if(newValu > 10){
    newValu = 'Stop'
  }

  $:{
    console.log(newValu)
  }
  const countHandle = () => {
    counter+=1
  }
</script>

<button on:click={countHandle}>Count value: {counter} Count * 2 =  {newValu}</button>