<template>
  <div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-white">Add User Role</h1>
    </div>

    <!-- Content Row -->
    <div>
      <section>
        <div class="container">
          <form @submit.prevent="roleInsert" enctype="multipart/form-data">
            <div class="form-row col-md-12">
              <div class=" col-md-6 ">
                <div class="form-group ">
                  <label class="white" for="input-title">Role Name</label>
                  <input
                    type="text"
                    v-model="form.role_name"
                    class="form-control"
                    id="input-title"
                    name="title"
                    aria-describedby="titleHelp"
                    placeholder="Enter Role Name"
                    required
                  />
                  <small class="text-warning" v-if="errors.role_name">{{ errors.role_name[0] }}</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </section>
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

		data(){
			return{
				form:{
					role_name :'',
				},
				errors:{}
			}
		},

		methods:{
			roleInsert(){
			  axios.post('/api/roleInsert/',this.form)
				.then(() => {
          Toast.fire({
              icon: 'success',
              title: 'User Role Added Successfully',
              showCloseButton: true
          })
					this.$router.push({ name: 'allRole' })
				})
				.catch(error => this.errors = error.response.data.errors)
			},
		}
	}
</script>


<style>
  .white{
    color: white;
  }
</style>
