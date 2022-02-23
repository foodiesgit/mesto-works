<template>
  <div class="home">
    <div class="child">
      <child :childtitle="'Child Function With Props'" />
    </div>
  </div>
</template>

<script>
import child from '@/components/child'
export default {
  name: 'Home',
  components:{
    child
  },
  data() {
    return{
    }
  },
  methods: {
    getParent(){
      alert('Parent Function is Fired From Child')
    }
  }
}
</script>
