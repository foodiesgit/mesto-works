<template>
  <div class="home">
    <Global />
    <button class="btn" @click="sendChild()">Send Childs</button>
    <div class="child">
      <child1 :childtitle1="child1"/>
      <child2 :childtitle2="child2"/>
    </div>
  </div>
</template>

<script>
import child1 from '@/components/child1'
import child2 from '@/components/child2'
export default {
  name: 'Home',
  components:{
    child1,
    child2
  },
  data() {
    return{
      child1:null,
      child2:null
    }
  },
  methods: {
    sendChild(){
      this.child1 = 'Child 1'
      this.child2 = 'Child 2'
    }
  }
}
</script>
<style scoped>
.child{
  display: flex;
  justify-content: space-between;
  width: 60%;
  margin: 10px auto;
  padding:3px 5px;
  background-color: darkslategrey;
}
.btn{
  width: 180px;
  height: 30px;
  font-size: 20px;
  font-weight: bold;
  color:darkslategrey;
  cursor: pointer;
}
</style>
