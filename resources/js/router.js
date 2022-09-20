import Vue from 'vue'
import Router from 'vue-router'
import store from './store'

import Login from './jwt-auth/Login.vue'
import Register from './jwt-auth/Register.vue'

import Dashboard from './layouts/Dashboard.vue'

import ViewUser from './admin/ViewUser.vue'
import addUser from './admin/addUser.vue'

import addStaff from './staff/addStaff.vue'
import viewStaff from './staff/viewStaff.vue'

Vue.use(Router)

const router = new Router({
	mode:'history',
	routes:[		
		{
			path:'/login',name:'login',component:Login, meta : {guest: true}
		},
		{
			path:'/',name:'register',component:Register, meta : {guest: true}
		},
		{
			path:'/dashboard/',name:'dashboard',component:Dashboard, meta : {requireAuth: true}
		},

    {
			path:'/addUser',name:'addUser',component:addUser
		},
    {
			path:'/ViewUser',name:'ViewUser',component:ViewUser
		},

    {
			path:'/addStaff',name:'addStaff',component:addStaff
		},
    {
			path:'/viewStaff',name:'viewStaff',component:viewStaff
		},
	]
});


// middleware 


router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requireAuth)) {
    if (store.getters.isLoggedIn) {
      next();
      return;
    }
    next("/login");
  } else {
    next();
  }
});

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.guest)) {
    if (store.getters.isLoggedIn) {
      next("/dashboard");
      return;
    }
    next();
  } else {
    next();
  }
});


export default router;