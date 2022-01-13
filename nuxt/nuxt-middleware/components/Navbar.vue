<template>
  <div id="navbar">
    Nuxt
    <nuxt-link to="/products">Products</nuxt-link>
    <nuxt-link to="/products/orders">Orders</nuxt-link>
    <nuxt-link to="/account">Account</nuxt-link>
  </div>
</template>
<style>
  #navbar{
    display: flex;
    align-items: center;
    height: 60px;
    background-color: #f1f1f1;
    box-shadow: 2px 2px 10px #999;
  }
</style>