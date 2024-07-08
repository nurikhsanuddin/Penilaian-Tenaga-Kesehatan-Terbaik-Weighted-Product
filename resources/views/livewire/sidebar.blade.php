<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-1">
                <a class="nav-link py-4 {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Dashboard
                </a>
                <a class="nav-link py-4 {{ request()->routeIs('employees.index') ? 'active' : '' }}"
                    href="{{ route('employees.index') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Nakes
                </a>
                @can('create', \App\Models\Criteria::class)
                    <a class="nav-link py-4 {{ request()->routeIs('criterias.index') ? 'active' : '' }}"
                        href="{{ route('criterias.index') }}" wire:navigate>
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list"></i></div>
                        Kriteria
                    </a>
                @endcan
                <a class="nav-link py-4 {{ request()->routeIs('assessments.index') ? 'active' : '' }}"
                    href="{{ route('assessments.index') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                    Penilaian
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::User()->name }}
        </div>
    </nav>
</div>
