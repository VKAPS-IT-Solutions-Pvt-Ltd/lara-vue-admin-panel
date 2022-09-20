<template>
  <div>
    <div class="wrapper">
      <Vueheader />
      <sidebar />
      <div class="content-wrapper">
        <form enctype="multipart/form-data" id="form">
          <div class="form-group">
            <table class="table">
              <tr>
                <td width="40%"><label>Select File for Upload</label></td>
                <td width="30">
                  <input type="file" @change="getExcelData" name="select_file" />
                </td>
                <td width="30%">
                  <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                </td>
              </tr>
            </table>
          </div>
        </form>
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
                      <th v-if="admin">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(staffData,index) in staffsData " :key="index">
                      <td>{{++index}}</td>
                      <td>{{staffData.name}}</td>
                      <td>{{staffData.email}}</td>
                      <td>
                        <button type="button" v-if="admin" class="btn btn-primary" data-toggle="modal"
                          data-target="#exampleModal" @click="editUserData(--index)">Edit</button>
                        &nbsp;
                        <button href="javascript:;" v-if="admin" class="btn btn-danger"
                          v-on:click="DeleteUser(--index)">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
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
                      <input type="text" name="name" class="form-control" placeholder="Email" v-model="name" />
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Password" v-model="email" />
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
  name: 'viewStaff',
  components: {
    Vueheader,
    sidebar,
    Vuefooter,
  },
  data() {
    return {
      staffsData: [],
      staffApi: 'http://127.0.0.1:8000/api/staff',
      api: 'http://127.0.0.1:8000/api/user',
      name: '',
      email: '',
      edit_staffsData_id: '',
      edit_index: '',
      admin: true,
    }
  },

  methods: {
    DeleteUser(index) {
      if (confirm("Do you really want to delete?")) {
        if (this.staffsData[index].id) {
          this.axios.delete(this.api + '/' + this.staffsData[index].id).then(res => {
            alert(res.data);
          });
        }
        this.fetchStaff();
      }
    },
    editUserData(index) {

      if (this.staffsData[index].id) {
        this.name = this.staffsData[index].name;
        this.email = this.staffsData[index].email;
        this.edit_usersData_id = this.staffsData[index].id;
        this.edit_index = index;
      }
    },
    updateUser() {
      if (this.name.length > 0 || this.email.length > 0) {
        let data = { 'name': this.name, 'email': this.email };
        this.axios.put(this.api + '/' + this.staffsData[this.edit_index].id, data).then(res => {
          this.staffsData[this.edit_index].name = res.data.name;
          alert("updated successfully");
        });
      }
      else {
        this.errors = "Invalid data";
      }
      this.fetchStaff();
    },
    fetchStaff() {
      this.axios.get(this.staffApi).then(res => {
        this.staffsData = res.data;
      });
    },
    getExcelData(e) {
      //const formData = new FormData();
      const file = e.target.files[0];
      const formdata = new FormData(form);
      //formData.append('file', file);
      axios.post("http://127.0.0.1:8000/api/import_excel/importUser", formdata).then(function (response) {
        // this.users=response.data;
        console.log("working now");
        console.log(file);
        console.log(response)
      }.bind(this))
    },

  },
  mounted() {
    this.fetchStaff();
    if (localStorage.getItem("role_id") == 2) {
      this.admin = false;
    }
  }
}
</script>
<style>

</style>