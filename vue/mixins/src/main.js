import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

Vue.filter('lowerCase',(value) => {
  return value.toLowerCase()
})
Vue.filter('capitalize',(value) => {
  return value.charAt(0).toUpperCase() + value.slice(1)
})
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
