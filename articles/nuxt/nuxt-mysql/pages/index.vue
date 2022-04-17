<template>
  <div class="container">
    <h2>Main Page</h2>
    <ul>
      <li v-for="(user,index) in users" :key="index">
        <span>{{user.user}}</span>
        <span>{{user.credit}}</span>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name:'index',
  data () {
    return {
      users:{}
    }
  },
  mounted() {
    this.getUsers()
  },
  methods:{
    async getUsers(){
      await axios.get('/api').then(result =>{
        this.users = result.data
      })
    }
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  text-align: center;
}
ul{
  width: 200px;
  padding: 10px;
  list-style: none;
  border:1px solid #ccc;
  border-radius: 4px;
  margin: 20px auto;
}
ul > li{
  display: flex;
  border-bottom: 1px solid #ccc;
  padding: 5px;
}
ul > li > span{
  width: 50%;
  text-align: left;
}
</style>
