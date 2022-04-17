<template>
  <div class="dynamic1">
    <h2 class="counter">
      <span>{{title}}</span>
      <button @click="setCounter()" class="btn">Counter</button>
      <span>{{counter}}</span>
    </h2>
  </div>    
</template>
<script>
export default {
  name:'dynamic1',
  data (){
    return{
      title:'Dynamic 1',
      counter:0
    }
  },
  methods:{
    setCounter(){
      this.counter++
    }
  },
  beforeDestroy(){
    //this not works for used keep-alive so use activated, deactivated
    alert('Component 1 is Destroyed')
  },
  activated(){
    alert('Activated')
  },
  deactivated(){
    alert('Deactivated')
  }
}
</script>
<style scoped>
.dynamic1{
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  height: auto;
  padding: 0 10px;
  font-size: 20px;
  font-weight: bold;
  color:#fff;
  cursor: pointer;
  background-color: dodgerblue;
  border: 2px solid #333;
}
.counter{
  display: flex;
  justify-content: space-around;
  width: 100%;
}
.btn{
  width: 100px;
  cursor: pointer;
}
</style>