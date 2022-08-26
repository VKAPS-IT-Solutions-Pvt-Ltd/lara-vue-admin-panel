<template>
<div>
   <div class="wrapper">
   <Vueheader />
   <sidebar />
   <div class="content-wrapper">
   <div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">User Table</h3>
</div>

<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>User</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <tr v-for="(UserData,index) in UsersData " :key="index">
<td>{{++index}}</td>
<td>{{UserData.name}}</td>
<td>{{UserData.email}}</td>
<td><button class="btn btn-primary" @click="EditUser">Edit</button>&nbsp;<button class="btn btn-danger" @click="DeleteUser(--index)">Delete</button></td>
</tr>

</tbody>
</table>
</div>

</div>

</div>
</div>
  </div>
  <Vuefooter />
</div>
</div>

</template>

<script>
import Vueheader from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/header.vue'
import sidebar from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/sidebar.vue'
import Vuefooter from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/Vuefooter.vue'

export default {
    name:'ViewUser',
    components:{
     Vueheader, 
     sidebar,
     Vuefooter,
    },
      data(){
        return{
            UsersData:[],
            api:'http://127.0.0.1:8000/api/user',
            name:'',
            email:''
        }
        },
        methods:{
         DeleteUser(index){
           if(this.UsersData[index].id){
                alert('are you want to delete??');
                this.axios.delete(this.api+'/'+this.UsersData[index].id).then(res=>{
                    alert(res.data);
                    this.todos.splice(index,1);
                });
            }
         },
         EditUser(){
            alert("edit this user");
         }
        },
        mounted() {
            this.axios.get(this.api).then(res=>{
            this.UsersData =  res.data;
            });
    }
}

</script>

<style>

</style>