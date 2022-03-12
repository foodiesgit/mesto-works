<script>
import { stop_propagation } from "svelte/internal";


</script>
<div on:click={() => console.log('You have clciked Div Event')}>
  <span>Outer Event</span>
  <input type="button" value="Inner Event" on:click|stopPropagation={() => console.log('You have clciked Button Event')}>
</div>

<style>
  div{
    width: 200px;
    background-color: antiquewhite;
    padding: 10px;
    margin: 0 auto;
  }
</style>