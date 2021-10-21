
//--------Authenticaton_Components----------
let Login = require('./components/auth/login.vue').default;
let Register = require('./components/auth/register.vue').default;
let forgetPass = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
let profile = require('./components/auth/profile.vue').default;
let changePassword = require('./components/auth/changePassword.vue').default;
//--or--import Register from './components/auth/register.vue' //--or--
//-------Home/Dashboard_Components----------
let home = require('./components/home.vue').default;
//-------Sidebar list Components----------
//-------Cagetory----------
let addCategory = require('./components/category/create.vue').default;
let editCategory = require('./components/category/edit.vue').default;
let categoryList = require('./components/category/index.vue').default;



export const routes = [
  //-------JWT/auth_routes--------
  { path: '/', component: Login, name: '/' },   //--amra ekane (name:'blah') ta use korteo pari,Nao pari,Not mendatory
  { path: '/register', component: Register, name: 'register' },   //--JWT-auth
  { path: '/forget', component: forgetPass, name: 'forget' },
  { path: '/logout', component: logout, name: 'logout' },
  { path: '/profile', component: profile, name: 'profile' },
  { path: '/changePassword', component: changePassword, name: 'changePassword' },
  //-------home_route----------
  { path: '/home', component: home, name: 'home' },       //--home_route
  //-------sidebar_routes----------
  //-------Cagetory----------
  { path: '/addCategory', component: addCategory, name: 'addCategory' },
  { path: '/editCategory', component: editCategory, name: 'editCategory' },
  { path: '/categoryList', component: categoryList, name: 'categoryList' },


]
