<template>
  <div class="home">
    <Global />
    <div class="btn-con">
      <button class="btn" @click="selectedComponent = 'dynamic1'">Dynamic 1</button>
      <button class="btn" @click="selectedComponent = 'dynamic2'">Dynamic 2</button>
      <button class="btn" @click="selectedComponent = 'dynamic3'">Dynamic 3</button>
    </div>
    <div class="dynamic-con">
      <!-- these components are rerendered look at the counter -->
    <component :is="selectedComponent"></component>
    </div>
  </div>
</template>

<script>
import dynamic1 from '@/components/dynamic1'
import dynamic2 from '@/components/dynamic2'
import dynamic3 from '@/components/dynamic3'
export default {
  name: 'Home',
  components:{
    dynamic1,
    dynamic2,
    dynamic3
  },
  data() {
    return{
      selectedComponent:'dynamic1'
    }
  },
  methods: {
    
  }
}
</script>
<style scoped>
.dynamic-con{
  display: flex;
  justify-content: center;
  width: 50%;
  margin: 10px auto;
  padding:7px;
  background-color: darkolivegreen;
}
.btn-con{
  display: flex;
  justify-content: space-around;
  width: 50%;
  margin: 10px auto;
  padding:7px;
  background-color: darkolivegreen;
}
.btn{
  width: 30%;
  cursor: pointer;
}
</style>
