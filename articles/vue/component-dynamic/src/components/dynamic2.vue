<template>
  <div class="dynamic2">
    <h2>{{title}}</h2>
  </div>    
</template>
<script>
export default {
  name:'dynamic2',
  data (){
    return{
      title:'Dynamic 2'
    }
  },
  methods:{
    
  }
}
</script>
<style scoped>
.dynamic2{
  display: flex;
  justify-content: center;
  width: 100%;
  height: auto;
  padding: 0 10px;
  font-size: 20px;
  font-weight: bold;
  color:#fff;
  cursor: pointer;
  background-color: darkslategray;
  border: 2px solid #333;
}
</style>