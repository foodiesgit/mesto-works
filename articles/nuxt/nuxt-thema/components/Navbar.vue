<template>
  <div id="navbar">
    <nuxt-link to="/products">Products</nuxt-link>
    <nuxt-link to="/account">Account</nuxt-link>
    <label for="clr-black"  class="clr-rd-lb clr-black">
      <input type="radio" v-model="thema" id="clr-black" class="clr-btn" value="/black.css"/>
    </label>

    <label for="clr-blue" class="clr-rd-lb clr-blue">
      <input type="radio" v-model="thema" id ="clr-blue" class="clr-btn" value="/blue.css"/>
    </label>

    <label for="clr-green" class="clr-rd-lb clr-green">
      <input type="radio" v-model="thema" id ="clr-green" class="clr-btn" value="/green.css"/>
    </label>
  </div>
</template>
<script>
export default {
  head () {
    return {
      link:[{href:this.thema, rel:'stylesheet'}]
    }
  },
  data() {
    return {
      thema:'/black.css'
    }
  },
}
</script>
<style>
  
</style>