<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Komisi Pemilihan Umum Fakultas Hukum</title>
  <link rel="icon" href="/assets/photo/KPU PNG.png" type="image/png">
  <link rel="shortcut icon" type="image/png" href={{asset("../assets/images/logos/favicon.png")}} />
  <link rel="stylesheet" href={{asset("../assets/css/styles.min.css")}} />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            @if (Auth::user()->role == 'admin')
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/admin" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Candidates</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/admin/candidates" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Show Candidates</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/admin/add-candidate" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Add Candidate</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/admin/add-vision" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Add Vision</span>
                </a>
            </li>
              <li class="sidebar-item">
              <a class="sidebar-link" href="/admin/add-mission" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Add Mission</span>
              </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Vote</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="/admin/list-voters" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Voters</span>
                </a>
              </li>
            @endif
           
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Auth</span>
              </li>
            <li class="sidebar-item">
              <a class="sidebar-link" data-bs-toggle="modal" data-bs-target="#logout" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
           
         
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
  <script src={{asset("../assets/libs/jquery/dist/jquery.min.js")}}></script>
  <script src={{asset("../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}></script>
  <script src={{asset("../assets/js/sidebarmenu.js")}}></script>
  <script src={{asset("../assets/js/app.min.js")}}></script>
  <script src={{asset("../assets/libs/apexcharts/dist/apexcharts.min.js")}}></script>
  <script src={{asset("../assets/libs/simplebar/dist/simplebar.js")}}></script>
  <script src={{asset("../assets/js/dashboard.js")}}></script>
</body>

{{-- modal logout --}}
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="logout">Logout Alert</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Are you sure logout?</h6>
        </div>
        <div class="modal-footer">
            <form action="/logout" method="get">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
      </div>
    </div>
  </div>
</html>