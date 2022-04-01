import Vue from 'vue'
import { wrapFunctional } from './utils'

const components = {
  Alert: () => import('../..\\components\\alert.vue' /* webpackChunkName: "components/alert" */).then(c => wrapFunctional(c.default || c)),
  Chat: () => import('../..\\components\\chat.vue' /* webpackChunkName: "components/chat" */).then(c => wrapFunctional(c.default || c)),
  Chatside: () => import('../..\\components\\chatside.vue' /* webpackChunkName: "components/chatside" */).then(c => wrapFunctional(c.default || c)),
  Error: () => import('../..\\components\\error.vue' /* webpackChunkName: "components/error" */).then(c => wrapFunctional(c.default || c)),
  Marketsettings: () => import('../..\\components\\marketsettings.vue' /* webpackChunkName: "components/marketsettings" */).then(c => wrapFunctional(c.default || c)),
  Notfound: () => import('../..\\components\\notfound.vue' /* webpackChunkName: "components/notfound" */).then(c => wrapFunctional(c.default || c)),
  Preloader: () => import('../..\\components\\preloader.vue' /* webpackChunkName: "components/preloader" */).then(c => wrapFunctional(c.default || c)),
  Ratelimit: () => import('../..\\components\\ratelimit.vue' /* webpackChunkName: "components/ratelimit" */).then(c => wrapFunctional(c.default || c)),
  Ratesettings: () => import('../..\\components\\ratesettings.vue' /* webpackChunkName: "components/ratesettings" */).then(c => wrapFunctional(c.default || c)),
  Slipside: () => import('../..\\components\\slipside.vue' /* webpackChunkName: "components/slipside" */).then(c => wrapFunctional(c.default || c))
}

for (const name in components) {
  Vue.component(name, components[name])
  Vue.component('Lazy' + name, components[name])
}
