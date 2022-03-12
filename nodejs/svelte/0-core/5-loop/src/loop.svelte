<script>
  export let users
</script>

<ul>
  {#each users as item, index (item.id)}
     <li>{index}. {item.name} {item.salery}</li>
  {/each}
<hr>
  {#each users as {name,age}, index (index)}
     <li>{index}. {name} {age}</li>
  {/each}
<hr>
  {#each Array(5) as i, index (index)}
     <div>Loop</div>
  {/each}
</ul>

<style>
  ul{
    list-style: none;
  }
</style>