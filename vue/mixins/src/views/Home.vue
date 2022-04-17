<template>
  <div class="home">
   <h2>{{title}}</h2>
   <button @click="getMixin()">Test Mixin</button>
  </div>
</template>

<script>
import {test} from '../mixin'
export default {
  mixins:[test('hi')],
  name: 'Home',
  data() {
    return{
      title:'Mixins',
    }
  },
  methods: {
    getMixin(){
      this.getMsg('hello')
    }
  }
}
</script>
<style scoped>
.home{
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>
