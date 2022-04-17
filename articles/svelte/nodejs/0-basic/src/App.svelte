<script>
	export let name;
	import Router from "svelte-spa-router";

	import Home from './routes/Home.svelte'
	import Users from './routes/Users.svelte'
	import Contact from './routes/Contact.svelte'
	import Edit from './routes/Edit.svelte'
	import Details from './routes/Details.svelte'
	import Add from './routes/Add.svelte'
	import Error from './routes/Error.svelte'

  let routes = {
    "/": Home,
    "/users": Users,
    "/users/details/:id": Details,
    "/users/edit/:id": Edit,
    "/users/add": Add,
    "/contact": Contact,
    "*": Error,
  };
	
</script>

<main>
	<nav>
		<a href="#/">Home</a>
		<a href="#/users">Users</a>
		<a href="#/contact">Contact</a>
	</nav>
  <h1>{name}</h1>
	<Router {routes} />
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
		margin-bottom: 20px;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>