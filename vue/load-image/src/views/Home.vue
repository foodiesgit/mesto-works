<template>
  <div class="home">
    <input type="file" ref="file" style="display:none" @change="setImg($event)">
    <button @click="$refs.file.click()">Select File</button>
    <img :src="selectedImg == null ? require('../assets/img/logo.png') : selectedImg" alt="" class="img">
    <ul class="img-con" >
      <li class="img-list" v-for="(list, index) in images" :key="index">
        <img :src="list.img" alt="" class="sub-img">
        <span>{{list.title}}</span>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data() {
    return{
      selectedImg: null,
      images:[]
    }
  },
  methods: {
    setImg(event){
      this.selectedImg = URL.createObjectURL(event.target.files[0])
      this.images.push({
        title:event.target.files[0].name,
        img:URL.createObjectURL(event.target.files[0])
      })
    }
  }
}
</script>
<style scoped>
.home{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.logo{
  width: 100px;
  height: 80px;
}
.img{
  width: 300px;
  height: 240px;
}
.img-con{
  display: flex;
  align-items: center;
  width: 80%;
  height: 120px;
  padding: 10px;
  margin-top: 20px;
  background-color: darkkhaki;
  overflow-x: auto;
}
.img-list{
  display: flex;
  flex-direction: column;
  height: 100%;
  margin: 0 10px;
}
.sub-img{
  width: 150px;
  height: 80px;
}
</style>
