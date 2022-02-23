import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _ff928628 = () => interopDefault(import('..\\pages\\home.vue' /* webpackChunkName: "pages/home" */))
const _58e176f1 = () => interopDefault(import('..\\pages\\home\\account.vue' /* webpackChunkName: "pages/home/account" */))
const _a009471e = () => interopDefault(import('..\\pages\\home\\account\\index.vue' /* webpackChunkName: "pages/home/account/index" */))
const _3acb1fd2 = () => interopDefault(import('..\\pages\\home\\account\\basketinplaymarkets.vue' /* webpackChunkName: "pages/home/account/basketinplaymarkets" */))
const _2b39f303 = () => interopDefault(import('..\\pages\\home\\account\\basketliverate.vue' /* webpackChunkName: "pages/home/account/basketliverate" */))
const _27f1c450 = () => interopDefault(import('..\\pages\\home\\account\\basketmarkets.vue' /* webpackChunkName: "pages/home/account/basketmarkets" */))
const _419f1597 = () => interopDefault(import('..\\pages\\home\\account\\basketrate.vue' /* webpackChunkName: "pages/home/account/basketrate" */))
const _6d1f6598 = () => interopDefault(import('..\\pages\\home\\account\\basketratelimit.vue' /* webpackChunkName: "pages/home/account/basketratelimit" */))
const _545e589e = () => interopDefault(import('..\\pages\\home\\account\\boss.vue' /* webpackChunkName: "pages/home/account/boss" */))
const _762f3e13 = () => interopDefault(import('..\\pages\\home\\account\\branch.vue' /* webpackChunkName: "pages/home/account/branch" */))
const _2fb9ec88 = () => interopDefault(import('..\\pages\\home\\account\\codelist.vue' /* webpackChunkName: "pages/home/account/codelist" */))
const _15fcad4a = () => interopDefault(import('..\\pages\\home\\account\\creditlog.vue' /* webpackChunkName: "pages/home/account/creditlog" */))
const _e1e626c8 = () => interopDefault(import('..\\pages\\home\\account\\detailsaccount.vue' /* webpackChunkName: "pages/home/account/detailsaccount" */))
const _57671acf = () => interopDefault(import('..\\pages\\home\\account\\detailscomission.vue' /* webpackChunkName: "pages/home/account/detailscomission" */))
const _36a6a7f1 = () => interopDefault(import('..\\pages\\home\\account\\gamelog.vue' /* webpackChunkName: "pages/home/account/gamelog" */))
const _57f6026b = () => interopDefault(import('..\\pages\\home\\account\\generalset.vue' /* webpackChunkName: "pages/home/account/generalset" */))
const _3f8e0d42 = () => interopDefault(import('..\\pages\\home\\account\\info.vue' /* webpackChunkName: "pages/home/account/info" */))
const _7b8b3e28 = () => interopDefault(import('..\\pages\\home\\account\\loginlog.vue' /* webpackChunkName: "pages/home/account/loginlog" */))
const _6e3fa968 = () => interopDefault(import('..\\pages\\home\\account\\nextgoals.vue' /* webpackChunkName: "pages/home/account/nextgoals" */))
const _4ec4003d = () => interopDefault(import('..\\pages\\home\\account\\paycupons.vue' /* webpackChunkName: "pages/home/account/paycupons" */))
const _cfe3d7f0 = () => interopDefault(import('..\\pages\\home\\account\\profile.vue' /* webpackChunkName: "pages/home/account/profile" */))
const _84d0e758 = () => interopDefault(import('..\\pages\\home\\account\\register.vue' /* webpackChunkName: "pages/home/account/register" */))
const _6fa96f4a = () => interopDefault(import('..\\pages\\home\\account\\setlimit.vue' /* webpackChunkName: "pages/home/account/setlimit" */))
const _f74634e4 = () => interopDefault(import('..\\pages\\home\\account\\settime.vue' /* webpackChunkName: "pages/home/account/settime" */))
const _20e2d12e = () => interopDefault(import('..\\pages\\home\\account\\singelbets.vue' /* webpackChunkName: "pages/home/account/singelbets" */))
const _c917fa58 = () => interopDefault(import('..\\pages\\home\\account\\soccerinplaymarkets.vue' /* webpackChunkName: "pages/home/account/soccerinplaymarkets" */))
const _459643b4 = () => interopDefault(import('..\\pages\\home\\account\\soccerliverate.vue' /* webpackChunkName: "pages/home/account/soccerliverate" */))
const _1d2b68cd = () => interopDefault(import('..\\pages\\home\\account\\soccermarkets.vue' /* webpackChunkName: "pages/home/account/soccermarkets" */))
const _01bb0a3a = () => interopDefault(import('..\\pages\\home\\account\\soccerrate.vue' /* webpackChunkName: "pages/home/account/soccerrate" */))
const _56d2c671 = () => interopDefault(import('..\\pages\\home\\account\\soccerratelimit.vue' /* webpackChunkName: "pages/home/account/soccerratelimit" */))
const _6cd75687 = () => interopDefault(import('..\\pages\\home\\account\\Users.vue' /* webpackChunkName: "pages/home/account/Users" */))
const _7c756923 = () => interopDefault(import('..\\pages\\home\\account\\users\\_id.vue' /* webpackChunkName: "pages/home/account/users/_id" */))
const _4192f647 = () => interopDefault(import('..\\pages\\home\\basketfixture.vue' /* webpackChunkName: "pages/home/basketfixture" */))
const _45726dea = () => interopDefault(import('..\\pages\\home\\basketinplay.vue' /* webpackChunkName: "pages/home/basketinplay" */))
const _36cc9ac4 = () => interopDefault(import('..\\pages\\home\\soccerfixture.vue' /* webpackChunkName: "pages/home/soccerfixture" */))
const _063820ee = () => interopDefault(import('..\\pages\\home\\soccerinplay.vue' /* webpackChunkName: "pages/home/soccerinplay" */))
const _2ca238a3 = () => interopDefault(import('..\\pages\\resetpass.vue' /* webpackChunkName: "pages/resetpass" */))
const _eae5e036 = () => interopDefault(import('..\\pages\\welcome.vue' /* webpackChunkName: "pages/welcome" */))
const _4a43b7d6 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/home",
    component: _ff928628,
    name: "home",
    children: [{
      path: "account",
      component: _58e176f1,
      children: [{
        path: "",
        component: _a009471e,
        name: "home-account"
      }, {
        path: "basketinplaymarkets",
        component: _3acb1fd2,
        name: "home-account-basketinplaymarkets"
      }, {
        path: "basketliverate",
        component: _2b39f303,
        name: "home-account-basketliverate"
      }, {
        path: "basketmarkets",
        component: _27f1c450,
        name: "home-account-basketmarkets"
      }, {
        path: "basketrate",
        component: _419f1597,
        name: "home-account-basketrate"
      }, {
        path: "basketratelimit",
        component: _6d1f6598,
        name: "home-account-basketratelimit"
      }, {
        path: "boss",
        component: _545e589e,
        name: "home-account-boss"
      }, {
        path: "branch",
        component: _762f3e13,
        name: "home-account-branch"
      }, {
        path: "codelist",
        component: _2fb9ec88,
        name: "home-account-codelist"
      }, {
        path: "creditlog",
        component: _15fcad4a,
        name: "home-account-creditlog"
      }, {
        path: "detailsaccount",
        component: _e1e626c8,
        name: "home-account-detailsaccount"
      }, {
        path: "detailscomission",
        component: _57671acf,
        name: "home-account-detailscomission"
      }, {
        path: "gamelog",
        component: _36a6a7f1,
        name: "home-account-gamelog"
      }, {
        path: "generalset",
        component: _57f6026b,
        name: "home-account-generalset"
      }, {
        path: "info",
        component: _3f8e0d42,
        name: "home-account-info"
      }, {
        path: "loginlog",
        component: _7b8b3e28,
        name: "home-account-loginlog"
      }, {
        path: "nextgoals",
        component: _6e3fa968,
        name: "home-account-nextgoals"
      }, {
        path: "paycupons",
        component: _4ec4003d,
        name: "home-account-paycupons"
      }, {
        path: "profile",
        component: _cfe3d7f0,
        name: "home-account-profile"
      }, {
        path: "register",
        component: _84d0e758,
        name: "home-account-register"
      }, {
        path: "setlimit",
        component: _6fa96f4a,
        name: "home-account-setlimit"
      }, {
        path: "settime",
        component: _f74634e4,
        name: "home-account-settime"
      }, {
        path: "singelbets",
        component: _20e2d12e,
        name: "home-account-singelbets"
      }, {
        path: "soccerinplaymarkets",
        component: _c917fa58,
        name: "home-account-soccerinplaymarkets"
      }, {
        path: "soccerliverate",
        component: _459643b4,
        name: "home-account-soccerliverate"
      }, {
        path: "soccermarkets",
        component: _1d2b68cd,
        name: "home-account-soccermarkets"
      }, {
        path: "soccerrate",
        component: _01bb0a3a,
        name: "home-account-soccerrate"
      }, {
        path: "soccerratelimit",
        component: _56d2c671,
        name: "home-account-soccerratelimit"
      }, {
        path: "Users",
        component: _6cd75687,
        name: "home-account-Users"
      }, {
        path: "users/:id?",
        component: _7c756923,
        name: "home-account-users-id"
      }]
    }, {
      path: "basketfixture",
      component: _4192f647,
      name: "home-basketfixture"
    }, {
      path: "basketinplay",
      component: _45726dea,
      name: "home-basketinplay"
    }, {
      path: "soccerfixture",
      component: _36cc9ac4,
      name: "home-soccerfixture"
    }, {
      path: "soccerinplay",
      component: _063820ee,
      name: "home-soccerinplay"
    }]
  }, {
    path: "/resetpass",
    component: _2ca238a3,
    name: "resetpass"
  }, {
    path: "/welcome",
    component: _eae5e036,
    name: "welcome"
  }, {
    path: "/",
    component: _4a43b7d6,
    name: "index"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
