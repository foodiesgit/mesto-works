<template>
  <div>
    <div class="slot">
      <slot></slot>
    </div>  
  </div>
</template>
<script>
export default {
  name:'memory',
  data (){
    return{
      title:'Child 1'
    }
  },
  methods:{
    
  }
}
</script>
<style scoped>
.slot{
  width: 30%;
  height: auto;
  margin: 0 auto;
  padding: 10px;
  font-size: 20px;
  font-weight: bold;
  color:#fff;
  cursor: pointer;
  background-color: dodgerblue;
  border: 2px solid #333;
}
</style>