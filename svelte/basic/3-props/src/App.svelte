<script>
  export let name;
  import Widget from "./Widget.svelte";
	import Images from "./Images.svelte"

  let content = "This message come from where called that component";
	let img = "../img/home.png"
</script>

<main>
  <h2>{name}</h2>
  <Widget content={content} />
  <Images img={img}/>
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
