<script>
  let readed = false
</script>
<div>
  <span>Input Binding</span>
  <span>
    <input type="checkbox" bind:checked={readed}>Accept
    <input type="button" value="Send" disabled={!readed}>
  </span>
</div>

<style>
  div{
    display: flex;
    flex-direction: column;
    width: 200px;
    margin: 0 auto;
  }
</style>