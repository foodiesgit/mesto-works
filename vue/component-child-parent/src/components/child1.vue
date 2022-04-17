<template>
  <div class="child1">
   <button class="btn" @click="sendParent()">Child 1</button>
  </div>
</template>
<script>
export default {
  name:'child1',
  data (){
    return{
    }
  },
  methods:{
    sendParent(){
      this.$emit('fromChild1','Child1')
    }
  }
}
</script>
<style scoped>
.child1{
  width: 46%;
  margin: 10px auto;
  padding: 10px;
  background-color:darkkhaki;
  color: #fff;
}
.btn{
  width: 120px;
  height: 30px;
  font-size: 20px;
  font-weight: bold;
  color:darkslategrey;
  cursor: pointer;
}
</style>