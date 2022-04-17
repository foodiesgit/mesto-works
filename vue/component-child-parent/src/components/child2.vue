<template>
  <div class="child2">
    <button class="btn" @click="sendParent()">Child 2</button>
  </div>
</template>
<script>
export default {
  name:'child2',
  data (){
    return{
    }
  },
  methods:{
    sendParent(){
      this.$emit('fromChild2','Child2')
    }
  }
}
</script>
<style scoped>
.child2{
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