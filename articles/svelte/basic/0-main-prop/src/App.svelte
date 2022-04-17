<script>
	export let name;
</script>

<main>
	<h2>{name}</h2>
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
		text-transform: uppercase;
		font-weight: 500;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>