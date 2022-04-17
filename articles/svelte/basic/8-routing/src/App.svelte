<script>
  export let name;
  import Router from "svelte-spa-router";

	import Home from './routes/Home.svelte'
	import Users from './routes/Users.svelte'
	import Contact from './routes/Contact.svelte'
	import Error from './routes/Error.svelte'

  let routes = {
    "/": Home,
    "/users": Users,
    "/users/:id": Users,
    "/contact": Contact,
    "*": Error,
  };

  let active = 'home';
</script>

<main>
	<nav>
		<a href="#/" class="{active === 'home' ? 'selected' : ''}" on:click="{() => active = 'home'}">Home</a>
		<a href="#/users" class="{active === 'users' ? 'selected' : ''}" on:click="{() => active = 'users'}">Users</a>
		<a href="#/contact" class="{active === 'contact' ? 'selected' : ''}" on:click="{() => active = 'contact'}">Contact</a>
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
  }

  .selected{
    color: red;
  }

  @media (min-width: 640px) {
    main {
      max-width: none;
    }
  }
</style>
