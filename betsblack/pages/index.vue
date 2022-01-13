<template>
  <section class="login-page">
    <transition name="slayt" appear>
      <form class="login-form" @submit.prevent="login">
        <header class="login-header">
          <span>Gasvet'e Hoş Geldiniz</span>
          <img  v-if="isLoader" src="~/static/img/loader.gif" alt="">
          <nuxt-link to="/resetpass" class="form-close">
            <i class="fas fa-eraser resetpass-icon fa-lg cl-w" title="Şifre Sıfırlama"/>
          </nuxt-link>
        </header>
        <div class="login-center">
          <div class="login-inputs-con">
            <i class="fas fa-user fa-lg login-icons" />
            <input v-model="user" type="text" @focus="removeError()" class="login-inputs" placeholder="Üye Adı" required oninvalid="this.setCustomValidity('Üye alanı boş bırakılamaz!')" oninput="setCustomValidity('')" tabindex='1' autofocus>
          </div>
          <div class="login-inputs-con">
            <i class="fas fa-unlock fa-lg login-icons" />
            <input v-model="pass" type="password" @focus="removeError()" class="login-inputs" placeholder="Şifre" required oninvalid="this.setCustomValidity('Şifre alanı boş bırakılamaz!')" oninput="setCustomValidity('')" tabindex='2'>
          </div>
        </div>
        <footer class="login-footer">
          <input v-if="isBtnLogin" type="submit" value="Giriş" class="alert btn-alert cl-d">
          <alert v-if="alert" :message="alert" class="alert"/>
          <error v-if="error" :message="error" class="error"/>
        </footer>
      </form>
    </transition>
  </section>
</template>
<script>
import axios from 'axios'
export default {
  name:'Index',
  data() {
    return {
      user: null,
      pass: null,
      alert: null,
      error: null,
      isBtnLogin: true,
      isLoader: false
    }
  },
  mounted () {
    if (!this.$store.state.auth) {
      this.$router.push('/')
    }
  },
  methods: {
    async login () {
      if (navigator.onLine === true){
        this.isLoader = true
        await axios.post('/api/login', { user: this.user, pass: this.pass }).then((result) => {
          if (result.data.code === 200) {
            this.$store.commit('setAuth', result.data.auth)
            this.error = null
            this.isBtnLogin = false
            this.alert = result.data.message
            setTimeout(() => {
              this.$router.push('/welcome')
              this.isLoader = false
            }, 1000)
          } else {
            this.isLoader = false
            this.isBtnLogin = false
            this.error = result.data.message
          }
        })
      }else {
        this.isBtnLogin = false
        this.error = 'Baglanti Yok!'
      }
    },
    removeError () {
      this.error = false
      this.isBtnLogin = true
    },
    
  }
}
</script>