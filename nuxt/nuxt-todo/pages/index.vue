<template>
  <div class="container">
    <h2>Main Page</h2>
    <div class="newuser">
      <input type="text" v-model="newUser.name" id="name" class="inputs" placeholder="Name">
      <input type="text" v-model="newUser.lastname" class="inputs" placeholder="Lastname">
      <input type="text" v-model="newUser.age" class="inputs" placeholder="Age">
      <button @click="addNewUser()" class="buttons1 add">Add New User</button>
    </div>
    <ul>
      <li v-for="(user,index) in users" :key="index">
        <span>{{user.name}}</span>
        <span>{{user.lastname}}</span>
        <span>{{user.age}}</span>
        <button @click="editUser(user._id)" class="buttons2 edit">Edit</button>
        <button @click="deleteUser(user._id,index)" class="buttons2 delete">Delete</button>
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
      users:{},
      newUser: {
        name:null,
        lastname:null,
        age:null
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
      await axios.post('/api/newuser',{newuser:this.newUser}).then(result =>{
        this.newUser = {}
        if (result.data === 200) {
          this.getUsers()
        }
      })
    },
    async editUser(index){
      if (this.newUser.name) {
        await axios.put('/api/edituser',{id:index, edituser:this.newUser.name}).then(result =>{
          if (result.data === 200) {
            this.getUsers()
          }
        })
      }else{
        document.getElementById('name').focus()
      }
    },
    async deleteUser(id,index){
      await axios.post('/api/deleteuser',{id:id}).then(result =>{
        if (result.data === 200) {
          this.users.splice(index,1)
        }
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
.buttons1{
  width: 100%;
  margin-top: 10px;
  border:none;
  border-radius: 3px;
  cursor: pointer;
  padding: 5px 0;
}
.buttons1:hover{
  filter: opacity(0.8);
}
.add{
  background-color: lightseagreen;
}
ul{
  width: 500px;
  height: 250px;
  padding: 10px;
  list-style: none;
  border:1px solid #ccc;
  border-radius: 4px;
  margin: 20px auto;
  overflow-x: auto;
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
.buttons2{
  width: 70px;
  height: 24px;
  margin: 0 5px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}
.buttons2:hover{
  transform: scale(1.1);
}
.edit{
  background-color: darkkhaki;
}
.delete{
  background-color: firebrick;
  color: #fff;
}
</style>
