<script>
	import Navbar from './navbar.svelte'
	// export let name;//grap from main.js and export to html
	let name = 'Mesto Kaya'
	let myImage = '/images/smegol.jpg'
</script>

<main>
	<!-- <h1>Hello {name}</h1> -->
	<Navbar name={name} myImage={myImage}/>
	
	<h2>Hello</h2>
</main>

<style>
	:global(h2){
		color: darkorange;
	}
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