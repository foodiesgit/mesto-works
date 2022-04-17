<script>
let name = ''
let salery = 0
const formHandle = () => {
  console.log(name +' '+ salery)
}
</script>

<form action="" method="get" on:submit|preventDefault={formHandle}>
  <input type="text" placeholder="name" bind:value="{name}">
  <input type="text" placeholder="salery" bind:value="{salery}">
  <button>Send</button>
  <!-- this dosnt work -->
  <!-- <input type="button" value=""> -->
</form>
<style>

</style>