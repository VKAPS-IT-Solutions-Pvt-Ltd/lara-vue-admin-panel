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
     <td>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" @click="editUserData(--index)" >Edit</button>
      &nbsp;
      <button href="javascript:;" class="btn btn-danger" v-on:click="DeleteUser(--index)">Delete</button></td>
    </tr> 
  </tbody>
  </table>
  </div>
  
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
               <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Email" v-model="name"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Password" v-model="email" />
             </div>                                     
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="updateUser" data-dismiss="modal">Update</button>
        </div>
      </div>
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
  import jQuery from "jquery";
  const $ = jQuery;
  window.$ = $;
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
              email:'',
              edit_usersData_id:'',
              edit_index:''
          }
          },
        
          methods:{
           DeleteUser(index){
    
              if(confirm("Do you really want to delete?")){
             if(this.UsersData[index].id){              
                  this.axios.delete(this.api+'/'+this.UsersData[index].id).then(res=>{
                      alert(res.data);
                  });
              }
              this.fetchUser();   
            }
           },
           editUserData(index){
            
                if(this.UsersData[index].id){
                this.name = this.UsersData[index].name;
                this.email= this.UsersData[index].email;
                this.edit_usersData_id = this.UsersData[index].id;
                this.edit_index = index;
              }
           },
           updateUser(){
            if(this.name.length > 0 || this.email.length > 0){
                  let data = {'name': this.name,'email':this.email};
                  this.axios.put(this.api+'/'+this.UsersData[this.edit_index].id,data).then(res=>{
               this.UsersData[this.edit_index].name = res.data.name;
               alert("updated successfully");        
              });
                 }
              else{
                   this.errors = "Invalid data";
                   }   
                   this.fetchUser();       
           },
           fetchUser(){
            this.axios.get(this.api).then(res=>{
              this.UsersData =  res.data;
              });
           }
          },   
            mounted() {
            this.fetchUser();  
      }
  }
  </script>
  <style>
  </style>