<script>
  let selected = 'Adana'
  const cities = ['Adana','Istanbul','Urfa','Mardin']
</script>
<div>
  <span>Input Binding Selectbox</span>
  <select name="" id="" bind:value={selected}>
    {#each cities as item}
       <option value="{item}">{item}</option>
    {/each}
  </select>
  <span>{selected}</span>
</div>

<style>
  div{
    display: flex;
    flex-direction: column;
    width: 200px;
    margin: 0 auto;
  }
</style>