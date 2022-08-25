<template>
  <div id="app">
   <div class="wrapper">
   <Vueheader />
   <sidebar />
  <div class="content-wrapper">
    <router-view/>
  </div>
  <Vuefooter />
  <div>
  </div>
  </div>
   </div>
</template>

<script>
import Vueheader from './header.vue'
import sidebar from './sidebar.vue'
import Vuefooter from './Vuefooter.vue'
   export default{
      components:{
    Vueheader,
    sidebar,
    Vuefooter,
},
   	name:"App",
      data(){
         return{
            user:''
         }
      },
   	computed : {
        isLoggedIn : function(){ 
         	return this.$store.getters.isLoggedIn
        }
      },
      created(){
         if(this.isLoggedIn){
            this.$store.dispatch('getUser');
         }
      },
      methods: {
        async logout (){
            await this.$store.dispatch('logout')
            this.$router.push('/login')
        }
      },
   }
</script>
