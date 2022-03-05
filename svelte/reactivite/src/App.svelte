<script>
	import Counter from './counter.svelte';
	import Counter2 from './counter2.svelte';
	import CounterSum from './counterSum.svelte';
	export let name;
</script>

<main>
	<h1>{name}</h1>
	<Counter /><br>
	<Counter2 /><br>
	<CounterSum />
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
		text-transform: uppercase;
		font-size: 4em;
		font-weight: 100;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>