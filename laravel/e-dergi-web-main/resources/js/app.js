require('./bootstrap');

window.Vue = require('vue').default;

// Vue.component('pspdfkit',require('./components/pspdfkit.vue').default);
Vue.component('categories-posts',require('./components/categories_posts.vue').default);

const app  =  new Vue({
    el:'#app',
});
