
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//----route imported-------
import {routes} from './routes';

//---import User Class----
import User from './helpers/User';
window.User = User                  //--for 'globally' use


//----start-----Sweetalert2------
import Swal from 'sweetalert2'
window.Swal = Swal              //--for 'globally' use

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;       //--for 'globally' use
//----End-----Sweetalert2------------//------


const router = new VueRouter({
  mode: 'history',     //To remove '#' from URL
  routes
})

const app = new Vue({
  el: '#app',     //--took id(#app) from root_html
  router         //-----------
});
