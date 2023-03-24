<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Carlos Jurado</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{ request()->is('administrador') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('administrador') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Panel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.dashboard') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Panel v1</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item has-treeview {{ request()->is('administrador/añadircategoria') || request()->is('administrador/categorias') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('administrador/añadircategoria') || request()->is('administrador/categorias') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Categorías
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.añadircategoria') }}"
                                class="nav-link {{ request()->is('administrador/añadircategoria') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Añadir Categoría</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.categorias') }}" class="nav-link {{ request()->is('administrador/categorias') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('administrador/añadirslider') || request()->is('administrador/sliders') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('administrador/añadirslider') || request()->is('administrador/sliders') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Sliders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.añadirslider') }}" class="nav-link {{ request()->is('administrador/añadirslider') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Añadir slider</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.sliders') }}" class="nav-link {{ request()->is('administrador/sliders') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('administrador/añadirproducto') || request()->is('administrador/productos') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('administrador/añadirproducto') || request()->is('administrador/productos') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Productos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.añadirproducto') }}" class="nav-link {{ request()->is('administrador/añadirproducto') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Añadir Producto</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrador.productos') }}" class="nav-link {{ request()->is('administrador/productos') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('administrador/ordenes') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('administrador/ordenes') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Ordenes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">
                            <a href="{{ route('administrador.ordenes') }}" class="nav-link {{ request()->is('administrador/ordenes') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Ordenes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0/" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
