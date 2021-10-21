<template>
  <div>
    <!-- Content Row -->
    <div >
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row justify-content-between">
          <div>
            <h4 class="m-0 font-weight-bold text-primary d-inline">User List Table</h4>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Role</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="allUser in allUsers" :key="allUser.id">
                    <td class="fontSize">{{allUser.name}} </td>
                    <td class="fontSize">{{allUser.email}} </td>
                    <td class="fontSize">{{allUser.role_name}} </td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div><!-- End card-body -->


      </div>
    </div>
  </div>
</template>

<script>
    export default {
      mounted(){
        if (!User.loggedIn()) {
            this.$router.push({ name:'/' })
        }
      },

      created(){
          this.getResults();
      },

      data(){
          return{
              allUsers:{},
          }
      },

      methods:{
          getResults() {
            axios.get('/api/allusers/')
              .then(({data}) => this.allUsers = data)
              .catch()
          },
      },
    }
</script>

<style scoped>
  label{
    color: black;
  }
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #434344;
    color: #48494c;
    background-color: rgb(243, 248, 194);
  }
  .table tbody td {
    color: #48494c;
  }
  .fontSize{
    font-size: 14px;
    font-weight: bold;
  }
</style>
