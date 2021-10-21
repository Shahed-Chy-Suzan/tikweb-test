<template>
  <div>
  <section id="authors" class="text-center pt-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h1 class="display-4 text-white">Admin's Profile</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12 justify-content-center">
          <div class="card">
            <div class="card-body">
              <img src="backend/img/undraw_profile.svg" class="img-fluid rounded-circle w-50 mb-3" alt="Susan Williams">
              <h3>name: </h3>
              <p class="lead">Email: </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
</template>

<script>
    export default {
        mounted(){
            if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },

        created(){			//--immediately showing data_table after opening file
            this.adminInfo();
        },

        data(){
            return{
                admins:[],
            }
        },
        methods:{
            adminInfo(){
                axios.post('/api/auth/me')		//--'get' will auto call index()_mathod in controller
                    .then(({data}) => this.admins = data)
                    .catch()
            },
        },
    }
</script>

<style>

</style>
