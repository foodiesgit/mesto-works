<template>
  <div class="home">
    <h2>{{counter}}</h2>
    <div>
  <!-- change directly -->
      <button @click="increase()">Increase</button>
      <button @click="decrease()">Decrease</button>
  <!-- change with commit -->
      <!-- <button @click="increase()">Increase</button>
      <button @click="decrease()">Decrease</button> -->
   <!-- change with mapmutations -->
      <!-- <button @click="updateCounter(5)">Increase</button>
      <button @click="updateCounter(-5)">Decrease</button> -->
   <!-- change with actions -->
      <!-- <button @click="asyncInrease()">Async Increase</button> -->
   <!-- change with mapactions -->
      <button @click="asyncInrease(5)">Async Increase</button>
    </div>
  </div>
</template>

<script>
import {mapGetters,mapMutations,mapActions} from 'vuex'
export default {
  name: 'Home',
  computed:{
    counter(){
      return this.$store.getters.getCounter
    }
  },
  methods:{
  //change directly
    increase(){
      this.$store.state.counter+=5
    },
    decrease(){
      this.$store.state.counter-=5
    },

  //change with commit mutations not mutations work as sync
    // increase(){
    //   this.$store.commit('updateCounter',5)
    // },
    // decrease(){
    //   this.$store.commit('updateCounter',-5)
    // },

  // change with mapmutations
  // ...mapMutations([
  //     'updateCounter'
  //   ]),

  // change with actions
    // asyncInrease(){
    //   this.$store.dispatch('asyncInrease',5)
    // },
  // change with mapactions
  ...mapActions([
      'asyncInrease'
    ])
  }
}
</script>
