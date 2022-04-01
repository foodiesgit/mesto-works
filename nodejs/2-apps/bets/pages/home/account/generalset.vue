<template>
  <div v-if="$store.state.auth.role === 'Admin'" class="pages po-r">
    <header id="content" class="title-2">
      <span class="set-title">SİSTEM GENEL AYARLARI</span>
    </header>
    <ul>
      <li class="fix-li-warning">
        <span class="sec-icon"><i class="fa fa-info fa-2x cl-f slbs"/></span>
        <span class="sec-text cl-g">
          Sayın üyeler bu alandaki degişikliklerden sonra sisteme yeniden Giriş yapılmalıdır!
        </span>
      </li>
      <div class="main-set-list">
        <li class="fix-li user-id-section">
          <div class="fix-1">
            <input type="checkbox" class="set-cb" :id="users.autopay" v-model="users.autopay" @change="updateAutoPay()" />
            <label class="set-lb" :for="users.autopay"></label>
            <span class="list-mn">Kazanan Kuponları Otomatik Öde?</span>
          </div>
        </li>
        <section class="user-id-section">
          <li class="fix-li-2">
            <i class="fas fa-key title-list-icon cl-g"/>
            <span class="fix-li-items">Hatalı Giris Sayısı</span>
            <input v-model="users.logincount" type="number" min="0" max="100" class="inp set-inp" :input="users.logincount">
            <i v-if="done === 'logincount'" class="fa fa-thumbs-up fa-2x cl-g slbs"/>
            <i v-else class="fa fa-save fa-2x cl-f slbs" @click="updateLoginCount()"/>
            <span class="cl-g">Dikkat! Verdiginiz degere ulaşılırsa sisteme giriş yapılamaz...</span>
          </li>
          <li class="fix-li-2">
            <i class="fas fa-key title-list-icon cl-g"/>
            <span class="fix-li-items">Bayi Komisyon</span>
            <input v-model="users.usercomission" type="number" min="0" max="50" class="inp set-inp" :input="users.usercomission">
            <i v-if="done === 'usercomission'" class="fa fa-thumbs-up fa-2x cl-g slbs"/>
            <i v-else class="fa fa-save fa-2x cl-f slbs" @click="updateUserComission()"/>
            <span class="cl-g">{{usererror}}</span>
          </li>
          <li class="fix-li-2">
            <i class="fas fa-key title-list-icon cl-g"/>
            <span class="fix-li-items">Müşteri Komisyon</span>
            <input v-model="users.personcomission" type="number" min="0" max="10" class="inp set-inp" :input="users.personcomission">
            <i v-if="done === 'personcomission'" class="fa fa-thumbs-up fa-2x cl-g slbs"/>
            <i v-else class="fa fa-save fa-2x cl-f slbs" @click="updatePersonComission()"/>
            <span class="cl-g">{{personerror}}</span>
          </li>
          <li>
          <li class="fix-li-2">
            <i class="fas fa-key title-list-icon cl-g"/>
            <span class="fix-li-items">Bayi Kupon İptal Süresi</span>
            <input v-model="users.usercancelbet" type="number" min="0" step="5" class="inp set-inp" :input="users.usercancelbet">
            <i v-if="done === 'usercancelbet'" class="fa fa-thumbs-up fa-2x cl-g slbs"/>
            <i v-else class="fa fa-save fa-2x cl-f slbs" @click="updateUserCancelbet()"/>
            <span class="cl-g">0 iptal edemez demektir!</span>
          </li>
          <li class="fix-li-2">
            <i class="fas fa-key title-list-icon cl-g"/>
            <span class="fix-li-items">Alt Bayi Kupon İptal Süresi</span>
            <input v-model="users.personcancelbet" type="number" min="0" step="5" class="inp set-inp" :input="users.personcancelbet">
            <i v-if="done === 'personcancelbet'" class="fa fa-thumbs-up fa-2x cl-g slbs"/>
            <i v-else class="fa fa-save fa-2x cl-f slbs" @click="updatePersonCancelbet()"/>
            <span class="cl-g">0 iptal edemez demektir!</span>
          </li>
          <li>
            <button  class="btn-set cp bg-g" @click="saveAll()">Kaydet</button>
          </li>
        </section>
      </div>
    </ul>
    <preloader v-if="isLoader" class="loader-con"/>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'Generalset',
  data () {
    return {
      users: {},
      isLoader:false,
      done:'',
      usererror:'',
      personerror:''
    }
  },
  mounted () {
    this.getUsers()
     this.goTop()
  },
  methods: {
    async getUsers () {
      this.isLoader = true
      await axios.get('/api/home/account/usersset').then((result) => {
        this.users = result.data.users[0]
        this.isLoader = false
      })
    },
    async updateAutoPay () {
      await axios.put('/api/home/account/updateautopay', {autopay:this.users.autopay}).then((result) => {
      })
    },
    async updateLoginCount () {
      await axios.put('/api/home/account/updatelogincount', {logincount:this.users.logincount}).then((result) => {
        if (result.data.code === 200) {
          this.done = 'logincount'
          setTimeout(() => {
            this.done = ''
          }, 1500)
        }
      })
    },
    async updateUserComission () {
      if (this.users.usercomission > 50) {
        this.usererror = 'Komisyon 50 den fazla olamaz!'
      } else {
        this.usererror = ''
        await axios.put('/api/home/account/updateusercomission', {userbox:'Üyeler', usercomission:this.users.usercomission}).then((result) => {
          if (result.data.code === 200) {
            this.done = 'usercomission'
            setTimeout(() => {
              this.done = ''
            }, 1500)
          }
        })
      }
    },
    async updatePersonComission () {
      if (this.users.personcomission > 10) {
        this.personerror = 'Komisyon 10 den fazla olamaz!'
      } else {
        this.personerror = ''
        await axios.put('/api/home/account/updatepersoncomission', {userbox:'Üyeler', personcomission:this.users.personcomission}).then((result) => {
          if (result.data.code === 200) {
            this.done = 'personcomission'
            setTimeout(() => {
              this.done = ''
            }, 1500)
          }
        })
      }
    },
    async updateUserCancelbet () {
      await axios.put('/api/home/account/updateusercancelbet', {userbox:'Üyeler', usercancelbet:this.users.usercancelbet}).then((result) => {
        if (result.data.code === 200) {
          this.done = 'usercancelbet'
          setTimeout(() => {
            this.done = ''
          }, 1500)
        }
      })
    },
    async updatePersonCancelbet () {
      await axios.put('/api/home/account/updatepersoncancelbet', {userbox:'Üyeler', personcancelbet:this.users.personcancelbet}).then((result) => {
        if (result.data.code === 200) {
          this.done = 'personcancelbet'
          setTimeout(() => {
            this.done = ''
          }, 1500)
        }
      })
    },
    saveAll (){
      this.$router.push('/welcome')
    },
    goTop (){
      const el = document.getElementById('content')
      el.scrollIntoView()
    }
  }
}
</script>
