<template>
  <div class="home">
    <Global />
    <button class="btn">{{title}}</button>
    <div class="child">
      <child1 @fromChild1="getTitle($event)"/>
      <!-- <child1 @fromChild1="title = $event"/> -->
      <!-- <child1 @fromChild1="title = 'Parent"/> -->
      <child2 @fromChild2="getTitle($event)"/>
      <!-- <child2 @fromChild2="title = $event"/> -->
      <!-- <child2 @fromChild2="title = 'Parent"/> -->
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
      title:null
    }
  },
  methods: {
    getTitle(event){
      this.title = event
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
