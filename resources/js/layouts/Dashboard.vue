<template>
   <div>
      <div class="wrapper">
         <Vueheader />
         <sidebar />
         <div class="content-wrapper">
            <router-view></router-view>
         </div>
         <Vuefooter />
      </div>
   </div>
</template>

<script>
import Vueheader from './header.vue'
import sidebar from './sidebar.vue'
import Vuefooter from './Vuefooter.vue'
import { mapGetters, mapActions } from "vuex";
export default {
   data() {
      return {
         id: this.$route.params.id
      }
   },
   components: {
      Vueheader,
      sidebar,
      Vuefooter,
   },
   computed: {
      ...mapGetters({ user: "getUser" }),
   },


}
</script>
