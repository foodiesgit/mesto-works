<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <select v-model="selectedPost"  class="form-control" v-on:change="getpostDetails()" style="width:33%" >
                    <option>Post Seçiniz:</option>
                    <option  v-for="(post,index) in posts" :key="index" :value="post.id">{{post.title}}</option>
                </select>
            </div>
        </div>
        <div class="row" v-if="show && postDetails.id>0  ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ postDetails.title}}</h5>
                        <p>{{ postDetails.description}}</p>
                        <p v-html=" postDetails.content"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a  class="download" v-for="(image,index) in postDetails.images" :key="index" :href="'/upload/post/'+image.image" :download="image.image">
                    <img  :src="'/upload/post/'+image.image" alt="" width="200" height="200" style="margin-left:5px;margin-top:5px">
                    <i class="fa fa-download"></i>
                </a>
            </div>
        </div>

    </div>
</template>

<script>
    import axios  from 'axios';
    export default {
        props:['posts','magazine','drafts'],
         data () {
            return {
                selectedPost: "Post Seçiniz:",
                postDetails:null,
                show:false,
            }
        },
        methods: {
            getpostDetails(){
                axios.get('/api/post/'+this.selectedPost)
                    .then(response => {
                        this.postDetails = response.data
                        this.show=true;
                    });
            }
        },
    }
</script>
<style >
    .download img:hover{
        opacity: 60%;
        box-shadow: 3px 4px 4px #333;
    }
    .download   i {
        position: absolute;
        margin-top: 100px;
        margin-left: -100px;
        color: white;
    }
</style>
