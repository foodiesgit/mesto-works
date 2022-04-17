<template>
  <div>
    <h2>{{title}}</h2>
   <button @click="getMixin()">Test Mixin</button>
  </div>
</template>
<script>
import {test} from '../mixin'
export default {
  mixins:[test('hi')],
  name:'about',
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
