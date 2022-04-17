<template>
  <div>
    <div class="slot">
      <slot name="slot1"></slot>
    </div>  
    <div class="slot">
      <slot name="slot2"></slot>
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
  margin: 10px auto;
  padding: 10px;
  font-size: 20px;
  font-weight: bold;
  color:#fff;
  cursor: pointer;
  background-color: dodgerblue;
  border: 2px solid #333;
}
</style>