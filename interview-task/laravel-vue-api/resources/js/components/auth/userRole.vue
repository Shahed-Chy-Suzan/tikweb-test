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
                      <td>
                    <form @submit.prevent="updateRole(allUser.id)">
                        <div class="col-md-6 d-inline">
                          <select v-model="form.role_id" class="form-control" id="Category" required>
                            <option value="" disabled>Choose a Role from here </option>
                            <option :value="allRole.id" v-for="allRole in allRoles" :key="allRole.id">
                              {{ allRole.role_name }}
                            </option>
                          </select>
                          <span class="flex-box col-md-4 d-inline">
                            <button type="submit" class="submit btn btn-danger text-white"><i
                                class="far fa-check-square"></i>
                            </button>
                          </span>
                        </div>
                    </form>
                      </td>
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

        axios.get('/api/allRoles')
          .then(({data}) => (this.allRoles = data))
      },

      created(){
          this.getResults();
      },

      data(){
          return{
            form:{
              role_id :'',
            },
              allUsers:{},
              allRoles:{},
          }
      },

      methods:{
          getResults() {
            axios.get('/api/allusers/')
              .then(({data}) => this.allUsers = data)
              .catch()
          },
          updateRole($id) {
            console.log($id);
            console.log(this.form.role_id);
            axios.put('/api/updateRole/'+$id,this.form)
            .then(() => {
                this.$router.push({ name: 'alluser' })
                Toast.fire({
                    icon: 'success',
                    title: 'User Role Updated Successfully',
                    showCloseButton: true
                })
              })
				    .catch(error => this.errors = error.response.data.errors)
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
