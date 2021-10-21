<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Tikweb-Test</title>
  <link rel="shortcut icon" href="{{asset("backend/img/img/white.png")}}" type="image/x-icon">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('backend/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <div id="app">

    <div id="wrapper">
      <!-- Sidebar -->
      <div id="leftbar" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true" style="display: none;">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <router-link to='/home' class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon ">
              <img src="{{asset("backend/img/img/white.png")}}"> <span>Tikweb-Test</span>
            </div>
          </router-link>
          <!-- Divider -->
          <br>
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <router-link to='/home' class="nav-link">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Tikweb-Test-Dashboard</span></router-link>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Nav Item - Pages Collapse Menu -->

          <!-- Heading -->
          <div class="sidebar-heading">
            User Section
          </div>
          <li class="nav-item">
            <router-link to='/profile' class="nav-link">
              <i class="fas fa-user fa-sm fa-fw"></i>
              <span>User Profile Show</span></router-link>
          </li>
          <li class="nav-item">
            <router-link to='/alluser' class="nav-link">
              <i class="fas fa-user fa-sm fa-fw"></i>
              <span>All User's List</span></router-link>
          </li>


          <!-- Heading -->
          <div class="sidebar-heading">
            User Role Section
          </div>
          {{-- <li class="nav-item">
            <router-link to='/userRole' class="nav-link">
              <i class="fas fa-user fa-sm fa-fw"></i>
              <span>User Role Management</span></router-link>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
              aria-expanded="true" aria-controls="collapsePages2">
              <i class="fas fa-list"></i>
              <span>User Role Section</span>
            </a>
            <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <router-link to="/addRole" class="collapse-item">Create User Role</router-link>
                <router-link to="/allRole" class="collapse-item">All User Role</router-link>
                <router-link to="/userRole" class="collapse-item">Assign User Role</router-link>
              </div>
            </div>
          </li>

          <!-- Heading -->
          <div class="sidebar-heading">
            Privacy Section
          </div>
          <li class="nav-item">
            <router-link to='/logout' class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <span>Log out</span></router-link>
          </li>

        </ul>
      </div>

      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="topbar" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true" style="display: none;">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">


              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="adminName">Mr. X</span> --}}
                  <img class="img-profile rounded-circle" src="{{asset("backend/img/undraw_profile.svg")}}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  {{-- <router-link to="/profile" class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </router-link> --}}
                  <router-link to="/logout" class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </router-link>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->


          <!-- Begin Page Content -->
          <div class="container-fluid">
            <router-view></router-view>     <!-------------------------------------->
          </div>
          <!-- End of Page Content -->


        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of  Wrapper -->




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


  </div>    <!---End___VUE_JS er jonno j id='app' div ta niyechilam pora body tar jonno--->




  <!--------------- Bootstrap core JavaScript ------------------>
  <script src="{{ asset('js/app.js') }}"></script>  <!--must be linked at the Top of All other JS_files-->
  <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('backend/js/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('backend/js/admin.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('backend/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('backend/js/demo/chart-pie-demo.js')}}"></script>

  <!--Topbar & Navbar Show korano[after login//'token' takle]-->
  <script>
    let token = localStorage.getItem('token');
    if(token) {
        $("#topbar").css("display","");
        $("#leftbar").css("display","");
    }
  </script>


</body>

</html>
