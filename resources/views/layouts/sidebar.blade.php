

<!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        
        <div class="sidebar-brand-text mx-3">PAL COMPANY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->level_user == 2)
         <!-- Heading -->
    <div class="sidebar-heading">
      User 
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ request()->is('management','ui','ceo','marketing','all') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Management user</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Management</h6>
              <a class="collapse-item {{request()->is('ui') ? 'active' : ''}}" href="{{ url('/ui')}}">UI Team</a>
              <a class="collapse-item {{request()->is('marketing') ? 'active' : ''}}" href="{{ url('/marketing')}}">Marketing Team</a>
              <a class="collapse-item {{request()->is('ceo') ? 'active' : ''}}" href="{{ url('/ceo')}}">CEO</a>
              <a class="collapse-item {{request()->is('all') ? 'active' : ''}}" href="{{ url('/all')}}">Semua Team</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item {{request()->is('kinerja/pegawai','kinerja/security','kinerja/sales') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Kinerja</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kinerja Pekerja</h6>
              <a class="collapse-item {{request()->is('kinerja/pegawai') ? 'active' : ''}}" href="{{ url('kinerja/pegawai') }}">Pegawai</a>
              <a class="collapse-item {{request()->is('kinerja/security') ? 'active' : ''}}" href="{{ url('kinerja/security') }}">Security</a>
              <a class="collapse-item {{request()->is('kinerja/sales') ? 'active' : ''}}" href="{{ url('kinerja/sales') }}">Sales</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

    @elseif (auth()->user()->level_user == 3)
       <!-- Heading -->
    <div class="sidebar-heading">
      Product
  </div>


  <!-- Nav Item - Charts -->
  <li class="nav-item {{ request()->is('product/charts') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('product/charts')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ request()->is('product/table') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('product/table')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  @elseif(auth()->user()->level_user == 1)
   <!-- Heading -->
   <div class="sidebar-heading">
    User 
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ request()->is('management','ui','ceo','marketing','all') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Management user</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Management</h6>
            <a class="collapse-item {{request()->is('ui') ? 'active' : ''}}" href="{{ url('/ui')}}">UI Team</a>
            <a class="collapse-item {{request()->is('marketing') ? 'active' : ''}}" href="{{ url('/marketing')}}">Marketing Team</a>
            <a class="collapse-item {{request()->is('ceo') ? 'active' : ''}}" href="{{ url('/ceo')}}">CEO</a>
            <a class="collapse-item {{request()->is('all') ? 'active' : ''}}" href="{{ url('/all')}}">Semua Team</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item {{request()->is('kinerja/pegawai','kinerja/security','kinerja/sales') ? 'active' : ''}}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kinerja</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kinerja Pekerja</h6>
            <a class="collapse-item {{request()->is('kinerja/pegawai') ? 'active' : ''}}" href="{{ url('kinerja/pegawai') }}">Pegawai</a>
            <a class="collapse-item {{request()->is('kinerja/security') ? 'active' : ''}}" href="{{ url('kinerja/security') }}">Security</a>
            <a class="collapse-item {{request()->is('kinerja/sales') ? 'active' : ''}}" href="{{ url('kinerja/sales') }}">Sales</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Product
</div>


<!-- Nav Item - Charts -->
<li class="nav-item {{ request()->is('product/charts') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('product/charts')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item {{ request()->is('product/table') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('product/table')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

@endif

   
</ul>
<!-- End of Sidebar -->