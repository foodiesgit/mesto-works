<script>
  export let name;
  import Widget from "./Widget.svelte";
</script>

<main>
  <h2>{name}</h2>
  <Widget content="Content as prop">
    <p>This is a slot without name that come from where called</p>
    <p slot="second-slot">This is a second slot with name that come from where called</p>
  </Widget>
</main>

<style>
  main {
    text-align: center;
    padding: 1em;
    max-width: 240px;
    margin: 0 auto;
  }

  h2 {
    color: #ff3e00;
    text-transform: uppercase;
    font-weight: bold;
  }

  @media (min-width: 640px) {
    main {
      max-width: none;
    }
  }
</style>
