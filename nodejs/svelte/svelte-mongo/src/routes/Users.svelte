<script>
	import { pop, push, replace } from "svelte-spa-router";
  import { onMount } from "svelte";

	let users = "";
	onMount(async () => {
		const result = await fetch("/users");
		users = await result.json();
	});
	const back = () => {
   pop()
  }
</script>
	{#if users}
		{#each users.users as item}
			<ul>
				<li>
					<span>{item.name}</span>
					<span>{item.salery}</span>
				</li>
			</ul>
		{/each}
	{:else}
		<p class="loading">loading...</p>
	{/if}

<button on:click={back}>Go Back</button>

<style>
	ul{
		list-style: none;
	}
</style>