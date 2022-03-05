<script>
  let auth = {
    loggedIn: false
  }
  const login = () => {
    auth.loggedIn = false
  }
  const logout = () => {
    auth.loggedIn = true
  }
</script> 
  
{#if auth.loggedIn}
  <button on:click={login}>Logout</button>
{:else}
  <button on:click={logout}>Login</button>
{/if}
