<script>
	import Users from "./users.svelte";
	export let name;
	let users = {
		name:'Mesto',
		salery:4000,
		age:50
	}
</script>

<main>
	<h1>{name}</h1>
	<Users {users}/>
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