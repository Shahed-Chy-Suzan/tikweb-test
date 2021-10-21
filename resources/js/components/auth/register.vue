<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form @submit.prevent="signup" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
            <span class="login100-form-title">
              Register New Account
            </span>

            <small class="text-danger" v-if="errors.name" style="color:red">{{ errors.name[0] }}</small>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
              <input class="input100" type="text" v-model="form.name" name="name" placeholder="Enter Full Name" required/>
              <span class="focus-input100"></span>
            </div>

            <small class="text-danger" v-if="errors.email" style="color:red">{{ errors.email[0] }}</small>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Please Enter Email">
              <input class="input100" type="email" v-model="form.email" name="email" placeholder="Enter Email" required />
              <span class="focus-input100"></span>
            </div>

            <small class="text-danger" v-if="errors.password" style="color:red">{{ errors.password[0] }}</small>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter password">
              <input class="input100" type="password" v-model="form.password" name="password" placeholder="Enter Password" required/>
              <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter confirm password">
              <input class="input100" type="password" v-model="form.password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password" required />
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23"></div>

            <div class="container-login100-form-btn p-b-40">
              <button class="login100-form-btn">
                Sign Up
              </button>
            </div>
          </form>

          <div class="card-footer text-center" style="background-color: #212529;">
              <div>
                  <router-link to="/" style="color: white;">Already have an account? Go to login</router-link>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
    export default {
        created(){
            if (User.loggedIn()) {
                this.$router.push({name:'home'})
            }
        },
        data(){
            return {
                form:{
                    name:null,
                    email:null,
                    password:null,
                    password_confirmation:null
                },
                errors:{},
            }
        },
        methods:{
            signup(){
                // alert('done');   //--testing submit
                axios.post('/api/auth/signup',this.form)
                // .then(response => console.log(response.data))
                .then(response => {
                    User.responseAfterLogin(response)
                    Toast.fire({
                        icon: 'success',
                        title: 'Signed in Successfully'
                    })
                    this.$router.push('/home')
                })
                // .catch(error => console.log(error.response.data))
                .catch(error => this.errors = error.response.data.errors)
            }
        }
    }
</script>


<style>

</style>
