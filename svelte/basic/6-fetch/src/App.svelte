<script>
	export let name;
	import Fetch from "./Fetch.svelte";
</script>

<main>
	<h2>Hello {name}!</h2>
	<Fetch />
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h2 {
		color: #ff3e00;
		font-weight: bold;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>