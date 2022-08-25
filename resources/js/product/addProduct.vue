<template>
  <div class="container">
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

                 
                 <form action="" method="post" @submit.prevent="submit">
                    <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="" class="form-control" placeholder="Name" v-model="product.name"/>
                    </div>
                    <div class="form-group">
                       <label>price</label>
                       <input type="Number" name="" class="form-control" placeholder="Price.." v-model="product.price" />
                    </div>
                                       
                    <div class="row">
                       <div class="col-4 text-left">
                       </div>
                       <div class="col-8 text-right">
                          <input type="submit" class="btn btn-primary pr-5 pl-5" value=" ADD " />
                       </div>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </div>
</template>

<script>
	
   export default{
    	name:'addProduct',
    	data(){
    		return{
    			product:{
    				name:'',
		      	price:'',
		      	},
		      	showError: false,
    		}
    	},
   }
</script>
<style>
   
.form-holder{
   margin-top:20%;
   margin-bottom:20%;
}
</style>