<template>
  <div class="child1">
   <button class="btn">{{childtitle1}}</button>
  </div>
</template>
<script>
export default {
  props:{
    childtitle1:String
    //string or array
    // childtitle1:[String,Array]
    //total validate
    //childtitle1:{
      // type:String,
      // required:true,
      //default:'Child'
    // }
  },
  name:'child1',
  data (){
    return{
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