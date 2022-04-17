<template>
  <div class="container">
    <h2>Main Page</h2>
    <div class="form-container">
      <input type="text" v-model="newUser.name" class="form-input" placeholder="name">
      <input type="text" v-model="newUser.password" class="form-input" placeholder="password">
      <button class="form-submit" @click="addNewUser()">Add New User</button>
    </div>
    <table>
      <tr class="list" v-for="(user,index) in users" :key="index">
        <td>{{user.name}}</td>
        <td>{{user.date}}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name:'index',
  data () {
    return {
      users:{},
      newUser: {
        name:'',
        password:''
      }
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
    },
    async addNewUser(){
      await axios.post('/api/newuser',{newUser:this.newUser}).then(result =>{
        this.newUser = {}
        this.getUsers()
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
.newuser{
  width: 200px;
  padding: 10px;
  border:1px solid #ccc;
  border-radius: 4px;
  margin: 20px auto;
}
.inputs{
  padding: 3px;
  border-radius: 3px;
  margin: 5px 0;
}
button{
  width: 100%;
  margin-top: 10px;
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
