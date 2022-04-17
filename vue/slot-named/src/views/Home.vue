<template>
  <div class="home">
    <Global />
    <memory>
      <h1 slot="slot1">Hello</h1>
      <p slot="slot2">Bu bir slottur</p>
    </memory>
  </div>
</template>

<script>
import memory from '@/components/memory'
export default {
  name: 'Home',
  components:{
    memory
  },
  data() {
    return{
      title:'Memory'
    }
  },
  methods: {
    
  }
}
</script>
<style scoped>
.memory{
  display: flex;
  justify-content: center;
  width: 20%;
  margin: 10px auto;
  padding:7px;
  background-color: darkslategrey;
}
</style>
