<nav class="sb-topnav navbar navbar-expand navbar-dark fixed-top">
  <!-- Navbar Brand-->
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-m order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars fa-lg"></i></button>
  <!-- Navbar Search-->
  <a class="navbar-brand ps-3" href="#">WP <span style="font-size: 10px !important;">Pemilihan Nakes Terbaik</span> </a>
  <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user fa-fw" style="color: white"></i>
        <span class="user-role" style="color: white">{{ Auth::User()->name }}</span>

      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>