<template>
  <div class="child1">
   <button class="btn" @click="childFunc()">Child Function</button>
   <button class="btn" @click="parentFunc()">Parent Function</button>
  </div>
</template>
<script>
export default {
  props:{
    childtitle1:String
  },
  name:'child1',
  data (){
    return{
    }
  },
  methods:{
    childFunc(){
      alert('Child Function')
    },
    parentFunc(){
      this.$parent.getParent()
    }
  }
}
</script>
<style scoped>
.btn{
  width: 180px;
  height: 30px;
  font-size: 20px;
  font-weight: bold;
  color:darkslategrey;
  cursor: pointer;
  margin: 0 10px;
}
</style>
