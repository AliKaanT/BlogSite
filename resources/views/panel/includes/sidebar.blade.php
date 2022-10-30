<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blog Sitesi<sup>7</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('panel.panel') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Anasayfa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Site
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('panel.settings') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Ayarlar</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('panel.pages')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Sayfalar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        İçerik
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('panel.categories')}}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Kategoriler</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('panel.posts')}}">
            <i class="fas fa-fw fa-camera"></i>
            <span>Gönderiler</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
