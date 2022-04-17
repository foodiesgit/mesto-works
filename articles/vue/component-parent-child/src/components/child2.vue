<template>
  <div class="child2">
    <button class="btn">{{childtitle2}}</button>
  </div>
</template>
<script>
export default {
  props:{
    childtitle2:String
    //string or array
    // childtitle2:[String,Array]
    //total validate
    //childtitle2:{
      // type:String,
      // required:true,
      //default:'Child'
    // }
  },
  name:'child2',
  data (){
    return{
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