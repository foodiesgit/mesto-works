<script>
  let num1 = 0
  let num2 = 0
</script>
<div>
  <span>Input Binding Num</span>
  <input type="number" bind:value={num1}>
  <input type="number" bind:value={num2}>
  <span>
    {num1} + {num2} =  {num1 + num2}
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