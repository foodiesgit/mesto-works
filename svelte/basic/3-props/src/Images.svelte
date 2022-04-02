<script>
	let title = 'Images Component';
  export let img;//come from where called the component
</script>

<main>
	<!-- static content -->
	<h2>{title}</h2>
	<!-- dynamic content -->
 <img src={img} alt="Not Found!">
</main>

<style>
	h2{
    font-size: 20px;
    color: 'blue';
  }

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>