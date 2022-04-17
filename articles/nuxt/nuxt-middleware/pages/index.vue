<template>
  <div>
    <Login />
  </div>
</template>

<script>
import Login from '@/components/Login.vue'
export default {
  'middleware':['auth'],//or call in nuxt js for all routes
  components: { Login },}
</script>