<script>
	import Loop from "./loop.svelte";
	export let name;
	let users = [
		{id:1,name:'Mesto',age:30, salery:300},
		{id:2,name:'Demir',age:40, salery:200},
		{id:3,name:'Faruk',age:30, salery:300}
	]
</script>

<main>
	<h1>{name}</h1>
	<Loop {users}/>
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