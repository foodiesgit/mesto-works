<script>
  import { marked } from "marked";
  let name = "Mesto";
  let readed = false;
  let text = "# Title";
  const lang = ["Javascript", "Nodejs", "Python"];
  let selected = "";
  let selectedMultiple = [];
  let selectedRadio = '';

</script>

<input type="text" bind:value={name} /><br />
{name}<br />

<input type="checkbox" bind:value={readed} /> Ok <br />
<button disabled={!readed}>Send</button> <br />

<textarea name="" id="" cols="30" rows="10" bind:value={text} /><br />
<!-- {marked(text)} -->
{@html marked(text)}

<select bind:value={selected} name="" id="">
  {#each lang as item (item)}
    <option value={item}>{item}</option>
  {/each}
</select><br>

{selected}
<br>
<br>
<br>

<p>Drag Options</p>
<select multiple bind:value={selectedMultiple}>
  {#each lang as item (item)}
    <option value={item}>{item}</option>
  {/each}
</select><br>

{selectedMultiple}


<p>Group Options</p>
  {#each lang as item (item)}
  <label for="{item}">
    <input type="radio" name="" id="{item}" bind:group="{selectedRadio}" value={item}>{item}
  </label>
  {/each}
<br>

{selectedRadio}
<style>
</style>
