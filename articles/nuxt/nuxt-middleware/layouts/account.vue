<template>
  <div id="account">
     <Navbar />
    <div id ="layout-container">
      <aside id="left-side">
        <h2>Left sidebar</h2>
        <!-- left sidebar -->
      </aside>
      
      <nuxt id = "layout" />

      <aside id="right-side">
        <h2>Right side</h2>
        <!-- right side -->
      </aside>

    </div>
    <Footer />
  </div>
</template>

<script>
export default {
  
}
</script>
<style>
  #account{
    display: flex;
    flex-direction: column;
    align-content: center;
    padding: 0;
    margin: 0;
  }
  #layout-container{
    display: flex;
    width: 100vw;
    min-height: calc(100vh - 100px);
  }
  #left-side{
    width: 15vw;
    background-color: green;
  }
  #layout{
    width: 70vw;
    background-color: red;
  }
  #right-side{
    width: 15vw;
    background-color: yellow;
  }
</style>