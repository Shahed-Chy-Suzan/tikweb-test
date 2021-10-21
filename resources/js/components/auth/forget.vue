<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form p-l-55 p-r-55 p-t-178">
            <span class="login100-form-title">
              Forget Password
            </span>

            <div class="wrap-input100 validate-input"
              data-validate="Please enter username">
              <input class="input100" type="email" v-model="form.email" placeholder="Existing Email Address" required />
              <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23"></div>

            <div class="container-login100-form-btn p-b-40">
              <button class="login100-form-btn">
                Forget Password
              </button>
            </div>
          </form>

          <div class="card-footer text-center" style="background-color: #212529;">
            <div>
              <router-link to="/" style="color: white;">Back to Login</router-link>
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
        this.$router.push('/home')
      }
    },
    data(){
      return {
        form:{
          email:null,
        },
        errors:{},
      }
    },
}
</script>


<style>

</style>
