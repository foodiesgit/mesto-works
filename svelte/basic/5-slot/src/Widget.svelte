<script>
  let title = "Widget Component";
 export let content
</script>

<!-- static content -->
<h2>{title}</h2>
<!-- dynamic content -->
<p>This is a component</p>
<p>{content}</p>
<slot></slot>
<slot name="second-slot"></slot>
<style>
	
</style>
