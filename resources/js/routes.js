
//--------Authenticaton_Components----------
let Login = require('./components/auth/login.vue').default;
let Register = require('./components/auth/register.vue').default;
let forgetPass = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
let profile = require('./components/auth/profile.vue').default;
let alluser = require('./components/auth/alluser.vue').default;
let addRole = require('./components/auth/addRole.vue').default;
let allRole = require('./components/auth/allRole.vue').default;
let userRole = require('./components/auth/userRole.vue').default;
//--or--import Register from './components/auth/register.vue' //--or--
//-------Home/Dashboard_Components----------
let home = require('./components/home.vue').default;
//-------Sidebar list Components----------




export const routes = [
  //-------JWT/auth_routes--------
  { path: '/', component: Login, name: '/' },
  { path: '/register', component: Register, name: 'register' },   //--JWT-auth
  { path: '/forget', component: forgetPass, name: 'forget' },
  { path: '/logout', component: logout, name: 'logout' },
  { path: '/profile', component: profile, name: 'profile' },
  { path: '/alluser', component: alluser, name: 'alluser' },
  { path: '/addRole', component: addRole, name: 'addRole' },
  { path: '/allRole', component: allRole, name: 'allRole' },
  { path: '/userRole', component: userRole, name: 'userRole' },
  //-------home_route----------
  { path: '/home', component: home, name: 'home' },       //--home_route
  //-------sidebar_routes----------


]
