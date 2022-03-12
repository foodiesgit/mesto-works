<script>
  let counter = 0
  const countHandle = () => {
    counter+=1
  }
  
</script>

<button on:click={countHandle}>Simple count: {counter}</button>
