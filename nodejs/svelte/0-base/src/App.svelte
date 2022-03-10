<script>
	export let name;
	import { onMount } from "svelte";
	let users = '';
	onMount(async () => {
		const result = await fetch("/users");
		users = await result.json();
	});
</script>

<main>
	<h1>{name}</h1>
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
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h1 {
		color: #ff3e00;
		font-weight: bold;
	}
	ul{
		list-style: none;
	}
	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>
