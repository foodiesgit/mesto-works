<script>
  let users = []
  const getUsers = async() => {
    const result = await fetch('https://jsonplaceholder.typicode.com/users')
    const final = await result.json()
    if (final) {
      users = final
    } else {
      throw new Error(final)
    }
  }
  getUsers()
</script>

<ul>
  {#each users as item, index}
     <li>{item.id} {item.username}</li>
  {/each}
</ul>

<style>
  ul{
    list-style: none;
  }
</style>