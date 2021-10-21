<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form @submit.prevent="changePassword" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
            <span class="login100-form-title">
              Change Password
            </span>

            <small class="text-danger" v-if="errors.oldpass" style="color:red">{{ errors.oldpass[0] }}</small>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Enter Old Password">
              <input class="input100" type="password" name="oldpass" v-model="form.oldpass" placeholder="Enter Old Password" required/>
              <span class="focus-input100"></span>
            </div>

            <small class="text-danger" v-if="errors.password" style="color:red">{{ errors.password[0] }}</small>
            <div class="wrap-input100 validate-input" data-validate="Enter New Password">
              <input class="input100" type="password" name="password" v-model="form.password" placeholder="Enter New Password" required/>
              <span class="focus-input100"></span>
            </div>

            <small class="text-danger" v-if="errors.password_confirmation" style="color:red">{{ errors.password_confirmation[0] }}</small>
            <div class="wrap-input100 validate-input" data-validate="Confirm Password">
              <input class="input100" type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password" required/>
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23"></div>

            <div class="container-login100-form-btn p-b-40">
              <button class="login100-form-btn">
                Submit
              </button>
            </div>
          </form>

          <div class="card-footer d-flex flex-row justify-content-between" style="background-color: #212529;">
            <div>
              <router-link to="/" style="color: white;">Goto Login Page?</router-link>
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
export default {
    created(){
        if(User.loggedIn()){
            this.$router.push({name : 'home'})      // or, //this.$router.push('/home')
        }
    },

    data(){
        return{
            form:{
                oldpass: null,
                password: null,
                password_confirmation: null,
            },
            errors:{}
        }
    },
    methods:{
        changePassword(){
            axios.post('/api/auth/changePassword',this.form)
            //.then(response => console.log(response.data))   //--here,(token+other's_info) situated in 'data' property
            .then(response => {
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Signed in Successfully'
                // })
                this.$router.push({name:'home'})
            })
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
