<script>
  let image
  const imageHandle = e => {
    if(!e.target.files[0]){
      image = false
      return
    }
    const reader = new FileReader()
    reader.addEventListener('load', function() {
      image = this.result
    })
    reader.readAsDataURL(e.target.files[0])
    console.log(e.target.files)
  }
</script>
<input type="file" name="" id="" accept="image/*" on:change="{imageHandle}" multiple>
<div>
  {#if image}
     <img src="{image}" alt="" width="300">
  {/if}
</div>