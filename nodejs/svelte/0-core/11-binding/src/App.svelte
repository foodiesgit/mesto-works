<script>
	import Input from "./input.svelte";
	import InputNumber from "./number.svelte";
	import Checkbox from "./checkbox.svelte";
	import Selectbox from "./selectbox.svelte";
	import Selectmulti from "./selectmulti.svelte";
	export let name;
</script>

<main>
	<h1>{name}</h1>
	<Input />
	<hr>
	<InputNumber />
	<hr>
	<Checkbox />
	<hr>
	<Selectbox />
	<hr>
	<Selectmulti />
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

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>