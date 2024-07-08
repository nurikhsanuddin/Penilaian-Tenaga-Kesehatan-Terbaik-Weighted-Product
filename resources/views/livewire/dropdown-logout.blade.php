<div>
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-user fa-fw" style="color: white"></i>
                <span class="user-role" style="color: white">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <button wire:click="logout" class="dropdown-item">Logout</button>
                    <div wire:loading>

                        Tunggu Dulut...

                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
