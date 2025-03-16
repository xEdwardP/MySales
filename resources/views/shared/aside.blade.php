    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-cash-register"></i><span>Ventas</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('new-sale')}}">
                            <i class="bi bi-circle"></i><span>Vender Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sale-details')}}">
                            <i class="bi bi-circle"></i><span>Consultar Ventas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('categories')}}">
                    <i class="fa-solid fa-list"></i>
                    <span>Categorias</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('customers')}}">
                    <i class="fa-solid fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('products')}}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Productos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('users')}}">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        </ul>

    </aside>
