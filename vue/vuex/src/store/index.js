import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    counter:0
  },
  getters:{
    getCounter(state){
      return state.counter * 5
    }
  },
  mutations: {
    updateCounter(state,payload){
      state.counter += payload
    },
    asyncUpdateCounter(state,payload){
      state.counter += payload
    }
  },
  actions: {
    asyncInrease({ commit }, payload){
      //this work after data come 
      setTimeout(() => {
        commit('asyncUpdateCounter',payload)
      }, 2000)
    }
  },
  modules: {
  }
})
