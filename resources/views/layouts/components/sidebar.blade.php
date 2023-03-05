<ul class="navbar-nav">
    <li class="nav-item  active ">
      <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{url('admin/dashboard')}}">
        <i class="ni ni-tv-2 text-primary"></i>Dashboard
      </a>
    </li>
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{ url('/admin/kota') }}">
        <i class="ni ni-bullet-list-67 text-red"></i> Asal Kota Makanan
      </a>
    </li>
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{ url('/admin/kategori') }}">
        <i class="ni ni-bullet-list-67 text-red"></i> Kategori Makanan
      </a>
    </li>
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{ url('/admin/resep') }}">
        <i class="ni ni-bullet-list-67 text-red"></i> Resep Makanan
      </a>
    </li>
    <li class="nav-item  active ">
      <a class="nav-link  active " href="{{ url('/admin/allresep') }}">
        <i class="ni ni-bullet-list-67 text-red"></i> Resep Makanan Disetujui
      </a>
    </li>
  </ul>
