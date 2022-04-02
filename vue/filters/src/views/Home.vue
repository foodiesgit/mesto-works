<template>
  <div class="home">
   <h2>{{title | upperCase}}</h2>
  <!-- global filters -->
   <h2>{{title2 | lowerCase}}</h2>
   <h2>{{title3 | capitalize}}</h2>
  </div>
</template>

<script>
import {test} from '../mixin'
export default {
  mixins:[test('hi')],
  name: 'Home',
  data() {
    return{
      title:'Uppercase',
      title2:'Lowercase',
      title3:'capitalize'
    }
  },
  filters:{
    upperCase(value){
      return value.toUpperCase()
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
