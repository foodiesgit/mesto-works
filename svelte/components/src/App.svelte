<script>
	import Navbar from "./navbar.svelte";
	import Image from "./image.svelte";

	let title = 'Home Page'
	let src = '../images/svelte.png'
</script>

<main>
	<Navbar title={title}/>
	<Image src={src}/>
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