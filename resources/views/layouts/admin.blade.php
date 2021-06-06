@include('partials.top')
<body id="page-top">
  {{-- Page Wrapper --}}
  <div id="wrapper">
    {{-- Barra laterar izquierda --}}
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      {{-- Logo --}}
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
          <img src="img/IT_Susananzth.png" alt="SusanaNzth">
      </a>
      <hr class="sidebar-divider my-0">
      {{-- Menú del Dashboard --}}
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="fa fa-tachometer"></i>
          <span>Panel administrativo</span></a>
      </li>
      <hr class="sidebar-divider">
      {{-- Título de menú --}}
      <div class="sidebar-heading">
        Administrador
      </div>
      {{-- Menú de roles --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true" aria-controls="collapseRole">
          <div class="nav-link-icon"><i class="fa fa-cog"></i></div>
          Roles
          <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="role" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Roles:</h6>
            <a class="collapse-item" href="buttons.html">Agregar Rol</a>
            <a class="collapse-item" href="cards.html">Listar Roles</a>
          </div>
        </div>
      </li>
      {{-- Menú de usuarios --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <div class="nav-link-icon"><i class="fa fa-user"></i></div>
          Usuarios
          <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="user" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Roles:</h6>
            <a class="collapse-item" href="buttons.html">Agregar Usuario</a>
            <a class="collapse-item" href="{{ url('/users') }}">Listar Usuarios</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      {{-- Sidebar Toggler (Sidebar) --}}
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    {{-- End of Sidebar --}}

    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">

      {{-- Contenido --}}
      <div id="content">
        {{-- Barra de navegación --}}
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          {{-- Botón de menú móbil --}}
          <button id="sidebarToggleTop" class="btn btn-p btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          {{-- Barra de búsqueda --}}
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buacar" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-p btn-primary" type="button">
                  <i class="fa fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            {{-- Botón para barra de búsqueda en móbil --}}
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-search fa-fw"></i>
              </a>
              {{-- Barra de búsqueda en móbil --}}
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-p btn-primary" type="button">
                        <i class="fa fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            {{-- Información de usuario --}}
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              {{-- Lista desplegable de información de usuario --}}
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>
        {{-- Fin de barra de navegación --}}

        {{-- Contenido de la página. Llamado con una función. --}}
        @yield('content')

      </div>{{-- /.container --}}
      {{-- Fin del contenido --}}

      {{-- Footer --}}
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SusanaNzth 2021</span>
          </div>
        </div>
      </footer>
      {{-- Fin del Footer --}}
    </div>
    {{-- Fin del Content Wrapper --}}
  </div>
  {{-- Fin del DIV Page Wrapper --}}

    {{-- Botón de scroll --}}
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    {{-- Ventana modal de cerrar sesión --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModal1">¿Desea cerrar la sesión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Cerrar sesión" si está de acuerdo en cerrar la sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
@include('partials.bottom')
