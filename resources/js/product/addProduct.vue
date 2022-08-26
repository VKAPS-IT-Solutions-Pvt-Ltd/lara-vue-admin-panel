<template>
<div class="wrapper">
   <Vueheader />
   <sidebar />
   <div class="content-wrapper">
    <div class="container" id="app">
   
     <div class="row">
        <div class="col-md-4 offset-md-4">
           <div class="card form-holder">
              <div class="card-body pt-4 pb-4">
                 <h1 class="text-muted">Add Product</h1>

                 <div v-if="showError">
                    <span v-if="errors">
                       <small v-for="error in errors" :key="error" class="text-danger d-block">{{ error[0] }}</small>
                    </span>
                 </div>

                 
                 
                    <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="" class="form-control" placeholder="Name" v-model="product.name"/>
                    </div>
                    <div class="form-group">
                       <label>Price</label>
                       <input type="Number" name="" class="form-control" placeholder="Price.." v-model="product.price" />
                    </div>
                    <div class="form-group">
                       <label>Quantity</label>
                       <input type="Number" name="" class="form-control" placeholder="quantity" v-model="product.quantity" />
                    </div>                 
                    <div class="row">
                       <div class="col-4 text-left">
                       </div>
                       <div class="col-8 text-right">
                          <input type="submit" class="btn btn-primary pr-5 pl-5" value=" ADD " v-on:click="SaveProduct" />
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
  
</template>

<script>
import Vueheader from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/header.vue'
import sidebar from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/sidebar.vue'
import Vuefooter from '/opt/lampp/htdocs/laravel-vue2/resources/js/layouts/Vuefooter.vue'
   export default{
    	name:'addProduct',
      components:{
        Vueheader, 
     sidebar,
     Vuefooter,
      },
    	data(){
    		return{
            api:'http://127.0.0.1:8000/api/products',
    			product:{
    				name:'',
		      	price:'',
               quantity:''
		      	},
		      	showError: false,
    		}
    	},
      methods:{
         SaveProduct(){
            let data = {
               'name':this.product.name,'price':this.product.price,'quantity':this.product.quantity
            }
          let productResult = this.axios.post(this.api,data);
          if(productResult){
            alert("hello");
          }
         
         }
      }
   }
</script>
<style>
   
.form-holder{
   margin-top:20%;
   margin-bottom:20%;
}
</style>