<template>
  <div>
    <Navbar />
    <nuxt id="products" />
    <Footer />
  </div>
</template>

<script>

export default {

}
</script>
<style>
  #products{
    display: flex;
    flex-direction: column;
    align-content: space-between;
    min-height: calc(100vh - 100px);
    padding: 0;
    margin: 0;
  }
</style>
