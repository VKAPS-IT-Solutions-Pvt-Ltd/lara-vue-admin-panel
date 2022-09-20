<template> 
    		<router-view></router-view>     
</template>

<script>
   export default{
   	name:"App",     
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
