<script>
  import { push } from "svelte-spa-router";
  const next = () => {
    push("/users")
  }
</script>
<h1>Home Page</h1>

<button on:click={next}>Forward</button>
