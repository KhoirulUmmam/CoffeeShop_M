<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-gray-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

       {{-- user account --}}
       
      <li class="dropdown user user-menu mt-2 px-3">
        <a href="#" class="dropdown-toggle text-light" data-toggle="dropdown">
          <img src="{{ asset('images/kopilogo.jpg') }}" alt="User Image" class="user-image img-circle elevation-2">
          <span class="d-none d-md-inline">Khoirul Ummam</span>
        </a>
        <ul class="dropdown-menu ">
          {{-- user image --}}
          <li class="user-header bg-gray-dark">
            <img src="{{ asset('images/kopilogo.jpg') }}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{ auth()->user()->name }} - {{ auth()->user()->email }}
              <small>Hi</small>
            </p>
          </li>

          {{-- user footer --}}
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat float-left"><i class="nav-icon fa fa-fw fa-user text-lightblue"></i>Profil</a>
            </div>
            <div class="pull-right ">
              <a href="#" class="btn btn-default btn-flat float-right" onclick="$('#logout-form').submit()"> <i class="nav-icon fa fa-fw fa-power-off text-red"></i>Keluar</a>
              
            </div>
          </li>
        </ul>
      </li>

      </div>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <form  action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
    @csrf
  </form>