<template>
  <div>
  <section id="authors" class="text-center pt-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h1 class="display-4 text-white">User's Individual Profile Show</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12 justify-content-center">
          <div class="card">
            <div class="card-body">
              <img src="backend/img/undraw_profile.svg" class="img-fluid rounded-circle w-50 mb-3" alt="Susan Williams">
              <h3>Name: {{admins.name}}</h3>
              <h3 class="lead">Email: {{admins.email}}</h3>
              <h3 v-if="admins.user_role == 0" class="lead">Role: Admin</h3>
              <h3 v-if="admins.user_role == 1" class="lead">Role: Moderator</h3>
              <h3 v-if="admins.user_role == 2" class="lead">Role: Editor</h3>
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
                user_id: User.id(),
                admins:[],
            }
        },
        methods:{
            adminInfo(){
                // axios.post('/api/auth/me')		//--'get' will auto call index()_mathod in controller
                //     .then(({data}) => this.admins = data)
                //     .catch()
                let id = User.id();
                axios.post('/api/profile/'+id)
                    .then(({data}) => this.admins = data)
                    .catch()
            },
        },
    }
</script>

<style>

</style>
