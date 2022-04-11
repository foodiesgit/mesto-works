<script>
  import { onMount } from "svelte";
  let final = [];
  onMount(async () => {
    const result = await fetch("https://jsonplaceholder.typicode.com/users");
    final = await result.json();
  });
  const inlineEvent = (param) => {
    console.log(param)
  }
  let isGreen = true
</script>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Username</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <!-- {#if final}
      {#each final as item (item.id)}
        <tr>
          <td>{item.name}</td>
          <td>{item.username}</td>
          <td>{item.email}</td>
        </tr>
      {/each}
    {:else}
      <p>No Datas</p>
    {/if} -->

    <!-- destructer mode -->
    {#if final}
      {#each final as {name,username,email,id} (id)}
        <tr>
          <td on:click={inlineEvent(name)}>{name}</td>
          <!-- <td on:click={() => inlineEvent(name)}>{name}</td> -->
          <td class:red={username === 'Bret'}>{username}</td>
          <td class:green={isGreen}>{email}</td>
        </tr>
      {/each}
    {:else}
      <p>No Datas</p>
    {/if}
  </tbody>
</table>

<style>
  .red{
    color: red;
  }
  .green{
    color: green;
  }
</style>
