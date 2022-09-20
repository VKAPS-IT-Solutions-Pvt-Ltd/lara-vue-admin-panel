<template>
   <div>
      <div class="wrapper">
         <Vueheader />
         <sidebar />
         <div class="content-wrapper">
            <div class="row">
               <div class="col-md-4 offset-md-4">
                  <div v-if="showError">
                     <span v-if="errors">
                        <small v-for="error in errors" :key="error" class="text-danger d-block">{{ error[0] }}</small>
                     </span>
                  </div>
                  <p v-if="success" class="text-success text-center">User added successfully..</p>
                  <div class="card form-holder">
                     <div class="card-body pt-4 pb-4">
                        <h1 class="text-muted">Add User</h1>
                        <form action="" method="post" @submit.prevent="submit">
                           <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="" class="form-control" placeholder="Name" v-model="form.name" />
                           </div>
                           <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="" class="form-control" placeholder="Email"
                                 v-model="form.email" />
                           </div>

                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="" class="form-control" placeholder="Password"
                                 v-model="form.password" />
                           </div>

                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" name="" class="form-control" placeholder="Confirm Password"
                                 v-model="form.password_confirmation" />
                           </div>

                           <div class="row">
                              <div class="col-4 text-left">
                              </div>
                              <div class="col-8 text-right">
                                 <input type="submit" class="btn btn-primary pr-5 pl-5" value="Add" />
                              </div>
                           </div>
                        </form>
                     </div>
                     <!--impoert and export user-->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" name="name" class="form-control" placeholder="Email"
                                       v-model="name" />
                                 </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Password"
                                       v-model="email" />
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary" @click="updateUser"
                                    data-dismiss="modal">Update</button>
                              </div>
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
import { mapActions, mapGetters } from 'vuex'
export default {
   name: 'addStaff',
   data() {
      return {
         form: {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
         },
         showError: false,
         success: false
      }
   },
   components: {
      Vueheader,
      sidebar,
      Vuefooter,
   },
   computed: {
      ...mapGetters({ errors: "getError" }),
   },
   methods: {
      ...mapActions(["Register"]),
      submit: function () {
         let data = {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
         };

         this.$store.dispatch('Register', data)
            .then(res => {
               this.success = true;
               this.form.name = '',
                  this.form.email = '',
                  this.form.password = '',
                  this.form.password_confirmation = ''
            }
            )
            .catch(err => {
               this.showError = true;
            })
      },
   }
}
</script>
<style>

</style>