import { wrapFunctional } from './utils'

export { default as Alert } from '../..\\components\\alert.vue'
export { default as Chat } from '../..\\components\\chat.vue'
export { default as Chatside } from '../..\\components\\chatside.vue'
export { default as Error } from '../..\\components\\error.vue'
export { default as Marketsettings } from '../..\\components\\marketsettings.vue'
export { default as Notfound } from '../..\\components\\notfound.vue'
export { default as Preloader } from '../..\\components\\preloader.vue'
export { default as Ratelimit } from '../..\\components\\ratelimit.vue'
export { default as Ratesettings } from '../..\\components\\ratesettings.vue'
export { default as Slipside } from '../..\\components\\slipside.vue'

export const LazyAlert = import('../..\\components\\alert.vue' /* webpackChunkName: "components/alert" */).then(c => wrapFunctional(c.default || c))
export const LazyChat = import('../..\\components\\chat.vue' /* webpackChunkName: "components/chat" */).then(c => wrapFunctional(c.default || c))
export const LazyChatside = import('../..\\components\\chatside.vue' /* webpackChunkName: "components/chatside" */).then(c => wrapFunctional(c.default || c))
export const LazyError = import('../..\\components\\error.vue' /* webpackChunkName: "components/error" */).then(c => wrapFunctional(c.default || c))
export const LazyMarketsettings = import('../..\\components\\marketsettings.vue' /* webpackChunkName: "components/marketsettings" */).then(c => wrapFunctional(c.default || c))
export const LazyNotfound = import('../..\\components\\notfound.vue' /* webpackChunkName: "components/notfound" */).then(c => wrapFunctional(c.default || c))
export const LazyPreloader = import('../..\\components\\preloader.vue' /* webpackChunkName: "components/preloader" */).then(c => wrapFunctional(c.default || c))
export const LazyRatelimit = import('../..\\components\\ratelimit.vue' /* webpackChunkName: "components/ratelimit" */).then(c => wrapFunctional(c.default || c))
export const LazyRatesettings = import('../..\\components\\ratesettings.vue' /* webpackChunkName: "components/ratesettings" */).then(c => wrapFunctional(c.default || c))
export const LazySlipside = import('../..\\components\\slipside.vue' /* webpackChunkName: "components/slipside" */).then(c => wrapFunctional(c.default || c))
