<script>
  let text = ''
</script>
<div>
  <span>Input Binding</span>
  <input type="text" bind:value={text}>
  <span>{text}</span>
</div>

<style>
  div{
    display: flex;
    flex-direction: column;
    width: 200px;
    margin: 0 auto;
  }
</style>