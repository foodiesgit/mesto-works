<script>
  let count = 0;
  $: reactivState = count * 2; //listen to count

  const Increment = () => {
    count < 10 ? count += 1 : alert('Finished');
  };
  const Decrement = () => {
    count > 0 ? count -= 1 : alert('Finished');
  };
</script>
<p>Count Value</p>
<h2>{count}</h2>
<p>Reactiv Value</p>
<h2>{reactivState}</h2>
<button on:click={Increment}>Increment</button>
<button on:click={Decrement}>Increment</button>

<style>
</style>
