<script>
  import { onMount } from "svelte";
  let final = [];
  onMount(async () => {
    const result = await fetch("/api/users");
    final = await result.json();
  });
</script>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Username</th>
      <th>Email</th>
      <th>Proccess</th>
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
    {#if final.users}
      {#each final.users as {name,username,email,id} (id)}
        <tr>
          <td class="col-4">{name}</td>
          <td class="col-4">{username}</td>
          <td class="col-4">{email}</td>
          <td class="col-2">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="#/users/details/2" class="btn btn-primary text-light">Details</a>
              <a href="#/users/edit/2" class="btn btn-warning">Edit</a>
              <button type="button" class="btn btn-danger btn-block">Delete</button>
            </div>
          </td>
        </tr>
      {/each}
    {:else}
      <p>No Datas</p>
    {/if}
  </tbody>
</table>
<style></style>
