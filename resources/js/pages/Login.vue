<template>
 <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body pt-5 pb-5">
                    <h1 class="text-muted">Login</h1>
                    <form action="" method="post" @submit.prevent="submit">
                        <div class="form-group">
                            <label>Email</label>
                              <input type="email" name="" placeholder="Email" class="form-control" v-model="form.email">
                        </div>
                         <div class="form-group">
                            <label>Password</label>
                              <input type="password" name="" placeholder="Password" class="form-control" v-model="form.password">
                        </div>
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="#" class="btn btn-link">forget password</a>
                            </div>
                        </div>
                        <div class="col-6 tetx-right">
                            <input type="submit" class="btn btn-primary pl-5 pr-5" vlaue="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
</template>
<script>
import { data } from 'browserslist';

export default {
    name : "login",
    data(){
      return {
        form:{
            email:'',
            password:''
        },
        showError:false,
      }
    }
}
</script>