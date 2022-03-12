<script>
	import Router from "svelte-spa-router";

	import Home from "./routes/Home.svelte";
	import Users from "./routes/Users.svelte";
	import Details from "./routes/Details.svelte";
	import Notfound from "./routes/Notfound.svelte";

	const routes = {
		"/": Home,
		"/users": Users,
		"/users/:id": Details,
		"*": Notfound,
	}
</script>

<main>
	<nav>
		<a href="#/">Home</a>
		<a href="#/users">Users</a>
	</nav>
	
	<Router {routes}/>
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}
	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>
