<script>
  let counter = [1,2,3,4,]

  const countHandle = () => {
    counter = [...counter, counter.length+1]
  }
  $:total = counter.reduce((prev,current) => prev+=current,0)
</script>

<button on:click={countHandle}>{counter}</button>
<h2>Total of counter array: {total}</h2>