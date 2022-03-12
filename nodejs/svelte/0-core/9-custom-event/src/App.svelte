<script>
	import Todos from "./todos.svelte";
	export let name;
	const todos = [
    {id:1,todo:'Project Starting', done:true},
    {id:2,todo:'Project Review', done:false},
    {id:3,todo:'Project Testing', done:false}
  ]
	//custom event for to change something in todos
	const changeHandle = (event) => {
    console.log(event)
  }
</script>

<main>
	<h1>{name}</h1>
	<ul>
		{#each todos as todo (todo.id)}
			 <Todos on:todoChanged={changeHandle} {todo} />
		{/each}
	</ul>
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