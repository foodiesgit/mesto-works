<script>
	export let name;
	let page = 'Home Page'
	let img = '../img/home.png'
	let img2 = '../img/home2.png'
	let img3 = {
		src:'../img/home3.png',
		alt: 'Home Icon',
		title: 'Home3 Icon'
	}
</script>

<main>
	<h2>{name}</h2>
	<h3>{page}</h3>
	<img src="{img}" alt="Home Icon" title= 'Home Icon'>
	<img src={img2} alt="Home Icon" title= 'Home2 Icon'>
	<img {...img3}>
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h2 {
		color: #ff3e00;
		text-transform: uppercase;
		font-weight: 500;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>