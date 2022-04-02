<script>
	let title = 'Widget Component';
  export let content;//come from where called the component
</script>

<main>
	<!-- static content -->
	<h2>{title}</h2>
	<!-- dynamic content -->
  <p>{content}</p>
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