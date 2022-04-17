<template>
  <div class="dynamic3">
    <h2>{{title}}</h2>
  </div>    
</template>
<script>
export default {
  name:'dynamic3',
  data (){
    return{
      title:'Dynamic 3'
    }
  },
  methods:{
    
  }
}
</script>
<style scoped>
.dynamic3{
  display: flex;
  justify-content: center;
  width: 100%;
  height: auto;
  padding: 0 10px;
  font-size: 20px;
  font-weight: bold;
  color:#fff;
  cursor: pointer;
  background-color: firebrick;
  border: 2px solid #333;
}
</style>