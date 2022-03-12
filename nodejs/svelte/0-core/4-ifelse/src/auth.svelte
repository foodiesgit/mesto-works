<script>
  let auth = {
    loggedIn: false
  }
  const authHandle = () => {
    auth.loggedIn = ! auth.loggedIn
  }
</script> 
  
{#if auth.loggedIn}
  <button on:click={authHandle}>Logout</button>
{:else}
  <button on:click={authHandle}>Login</button>
{/if}
