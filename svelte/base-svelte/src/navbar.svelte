<script>
  export let name
  export let myImage
</script>

<h2>{name.toUpperCase()}</h2>
<img src="{myImage}" alt="" width="200">

<style>
	h2 {
	  color: red;
	}
</style>