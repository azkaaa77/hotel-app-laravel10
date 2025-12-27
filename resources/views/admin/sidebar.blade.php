<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">{{ Auth::user()->name }}</h1>
        <p>Admin Hotel</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="/"> <i class="icon-home"></i>Home </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Kamar</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url ('halaman_tambah_kamar') }}">Tambah Kamar</a></li>
                <li><a href="{{ url ('data_kamar') }}">Data Kamar</a></li>
              </ul>
              <li><a href="{{ url ('data_booking_kamar') }}"><i class="bi bi-house-door"></i>Booking Kamar</a></li>
            </li>
            <li><a href="login.html"> <i class="icon-logout"></i>Logout</a></li>
  </nav>

