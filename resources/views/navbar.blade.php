@php
    $dashboardActive = Request::is('dashboard*');
    $coffeesActive = Request::is('coffees*');
    $logsActive = Request::is('logs*');
    $availableCoffeesActive = Request::is('available-coffees*');
    $boughtCoffeesActive = Request::is('bought-coffees*');
@endphp

<nav class="navbar navbar-expand-lg p-3" style="background-color: #8B4513; border: none;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white;">
            <i class="fas fa-coffee"></i> Coffee Shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown {{ $dashboardActive ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                        Dashboard
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ $dashboardActive ? 'active' : '' }}" href="/dashboard" style="color: #8B4513;"><i class="fas fa-chart-bar"></i> Dashboard</a>
                        @role('admin')
                        <a class="dropdown-item {{ $coffeesActive ? 'active' : '' }}" href="/coffees" style="color: #8B4513;"><i class="fas fa-coffee"></i> Coffee</a>
                        @endrole
                        @role('admin')
                        <a class="dropdown-item {{ $logsActive ? 'active' : '' }}" href="/logs" style="color: #8B4513;"><i class="fas fa-file-alt"></i> Logs</a>
                        @endrole
                    </div>
                </li>
                <li class="nav-item {{ $availableCoffeesActive ? 'active' : '' }}">
                    <a class="nav-link mx-2" href="/available-coffees" style="color: white;">
                        <i class="fas fa-check-circle"></i> Available Coffees
                    </a>
                </li>
                <li class="nav-item {{ $boughtCoffeesActive ? 'active' : '' }}">
                    <a class="nav-link mx-2" href="/bought-coffees" style="color: white;">
                        <i class="fas fa-shopping-cart"></i> Bought Coffees
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link mx-2" style="color: white;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
