<script>
  let isToggle
const toggleHandle = () => {
  isToggle = !isToggle
}
</script>

<h3 class:toggle={isToggle}>Toggle Class</h3>
<button on:click="{toggleHandle}">Change Color</button>
<style>
  .toggle{
    color: green;
  }
</style>