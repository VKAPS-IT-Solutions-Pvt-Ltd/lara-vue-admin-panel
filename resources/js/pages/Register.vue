<template>
 <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body pt-5 pb-5">
                    <h1 class="text-muted">Register</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                              <input type="Name" name="" placeholder="Name" class="form-control" v-model="form.name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                              <input type="email" name="" placeholder="Email" class="form-control" v-model="form.email">
                        </div>
                         <div class="form-group">
                            <label>Password</label>
                              <input type="password" name="" placeholder="Password" class="form-control" v-model="form.password">
                        </div>
                        <div class="form-group">
                            <label>Comfirm Password</label>
                              <input type="password" name="" placeholder="Confirm Password" class="form-control" v-model="form.password_confirmation">
                        </div>                    
                        <div class="col-6 tetx-right">
                            <input type="submit" class="btn btn-primary pl-5 pr-5 mt-3" value="register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
</template>
<script>
export default {
    name : "register",
     data(){
      return {
        form:{
            name:'',
            email:'',
            password:'',
            password_confirmation:''
        },
        showError:false,
      }
    }
}
</script>