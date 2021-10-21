<template>
  <div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-white">Tikweb-Test-Dashboard</h1>
    </div>

    <!-- Content Row -->

  </div>
</template>

<script>
export default {
  created(){
      if (!User.loggedIn()) {
          this.$router.push({name : '/'})
      }
  },
};
</script>

<style lang="scss" scoped></style>
