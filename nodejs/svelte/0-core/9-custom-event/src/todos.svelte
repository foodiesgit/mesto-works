<script>
  import {createEventDispatcher} from 'svelte'
  const dispatch = createEventDispatcher()
  export let todo

  const doneToggle = () => {
    todo.done = ! todo.done
    dispatch('todoChanged', todo)
  }
</script>

<ul>
  <li on:click={doneToggle}>
    <span>{todo.id}</span>
    <span>{todo.todo}</span>
    {#if todo.done}
       <span class="done">Done</span>
    {/if}
  </li>
</ul>
<style>
  ul{
    list-style: none;
  }
  .done{
    background-color: dodgerblue;
    color: #fff;
    padding: 3px 10px;
    margin-left: 10px;
    border-radius: 3px;
  }
</style>