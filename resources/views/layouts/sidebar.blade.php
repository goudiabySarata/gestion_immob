<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashbord')}}">
        <img src="{{asset('images/logo.png')}}" class="w-50" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashbord')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @php
    $route = request()->route()->getName()
    @endphp

    <!-- Nav Item - gestion des biens-->
    <li class="nav-item">
        <a @class(['nav-link collapsed', 'active' => str_contains($route, 'biens.')]) href="{{route('biens.index')}}" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Gestion des biens</span>
        </a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link collapsed', 'active' => str_contains($route, 'options.')]) href="{{route('options.index')}}" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Gérer les options</span>
        </a>
    </li>

    <!-- Nav Item - gestion des clients-->
    <li class="nav-item">
        <a class="nav-link" href="{{route('client')}}">
            <i class="fas fa-users"></i>
            <span>Gérer les clients</span>
        </a>
    </li>
    <!-- Nav Item - gestion des contrats-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('contrat')}}" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Gérer les contrats</span>
        </a>
    </li>
    <!-- Nav Item - gestion des propriétaire-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('proprietaire.index')}}" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Gérer les propriétaire</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('visite.index')}}" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Gérer les visites</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
