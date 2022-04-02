<script>
  let title = "Images Component";
  export let img; //come from where called the component
</script>

<!-- static content -->
<h2>{title}</h2>
<!-- dynamic content -->
<img src={img} alt="Not Found!" />

<style>
	
</style>
