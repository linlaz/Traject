<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
    <div class="sidebar-brand-text mx-3">Traject Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item ">
    <a class="nav-link" href="{{route('dashboard')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Travel Package -->
  <li class="nav-item ">
    <a class="nav-link" href="{{route('travel-package.index')}}">
      <i class="fas fa-fw fa-hotel"></i>
      <span>Travel Package</span></a>
  </li>

  <!-- Nav Item - Travel Gallery -->
  <li class="nav-item ">
    <a class="nav-link" href="{{route('gallery.index')}}">
      <i class="fas fa-fw fa-images"></i>
      <span>Travel Gallery</span></a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="{{route('hotel.index')}}">
      <i class="fas fa-fw fa-images"></i>
      <span>Hotel</span></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="{{route('galleryhotel.index')}}">
      <i class="fas fa-fw fa-images"></i>
      <span>Gallery Hotel</span></a>
  </li>

  <!-- Nav Item - Transaction -->
  <li class="nav-item ">
    <a class="nav-link" href="{{route('transaction.index')}}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Transaction Travel</span></a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="{{route('transactionhotel.index')}}">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Transaction Hotel</span></a>
  </li>

  <hr class="sidebar-divider">
  @if(Auth::user()->role == 'ADMIN')
  <li class="nav-item ">
    <a class="nav-link" href="/admin/mitra">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>mitra</span></a>
  </li>
  @endif
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
