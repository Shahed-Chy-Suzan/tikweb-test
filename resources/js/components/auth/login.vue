<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form @submit.prevent="login" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
            <span class="login100-form-title">
              Log In
            </span>

            <small class="text-danger" v-if="errors.email" style="color:red">{{ errors.email[0] }}</small>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
              <input class="input100" type="email" name="email" v-model="form.email" placeholder="Enter Email" required/>
              <span class="focus-input100"></span>
            </div>

            <small class="text-danger" v-if="errors.password" style="color:red">{{ errors.password[0] }}</small>
            <div class="wrap-input100 validate-input" data-validate="Please enter password">
              <input class="input100" type="password" name="password" v-model="form.password" placeholder="Enter Password" required/>
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23"></div>

            <div class="container-login100-form-btn p-b-40">
              <button class="login100-form-btn">
                Log in
              </button>
            </div>
          </form>

          <div class="card-footer d-flex flex-row justify-content-between" style="background-color: #212529;">
            <div>
              <router-link to="/forget" style="color: white;">Forgot Password?</router-link>
            </div>
            <div>
              <router-link to="/register" style="color: white;">Need an account? Sign up!</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//-------------------------------------------
export default {
    created(){
        if(User.loggedIn()){
            this.$router.push({name : 'home'})      // or, //this.$router.push('/home')
        }
    },

    data(){
        return{
            form:{
                email: null,
                password: null
            },
            errors:{}
        }
    },
    methods:{
        login(){
            axios.post('/api/auth/login',this.form)
            //.then(response => console.log(response.data))   //--here,(token+other's_info) situated in 'data' property
            .then(response => {
                User.responseAfterLogin(response)
                Toast.fire({
                    icon: 'success',
                    title: 'Signed in Successfully'
                })
                this.$router.push({name:'home'})
            })
            //.catch(error => console.log(error.response.data))
            .catch(error => this.errors = error.response.data.errors)
            .catch(
                Toast.fire({
                    icon: 'warning',
                    title: 'Email or Password Invalid'
                })
            )
        }
    }
}
</script>

<style></style>
