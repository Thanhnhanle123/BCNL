  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminCF/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item" id="navHome">
            <a href="{{ route('home.index') }}" class="nav-link">
                <i class="fas fa-home"></i>
              <p>{{ $homePage }}</p>
            </a>
          </li>
          <li class="nav-item" id="navCategory">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="fas fa-utensils"></i>
              <p>{{ $categoryPage }}</p>
            </a>
          </li>
          <li class="nav-item" id="navDrink">
            <a href="{{ route("drink.index") }}" class="nav-link">
                <i class="fas fa-coffee"></i> <!-- Biểu tượng cà phê -->
              <p>{{ $drinksPage }}</p>
            </a>
          </li>
          <li class="nav-item" id="navArea">
            <a href="#" class="nav-link">
                <i class="fas fa-laptop-house"></i>
              <p>{{ $areaPage }}</p>
            </a>
          </li>
          <li class="nav-item" id="navDisk">
            <a href="#" class="nav-link">
                <i class="fas fa-laptop-house"></i>
              <p>{{ $diskPage }}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
