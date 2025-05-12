<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
            <span class="align-middle">{{ env('APP_NAME') }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('user.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data User</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('gejala.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('gejala.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data
                        Gejala</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('penyakit.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('penyakit.index') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data
                        Penyakit</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Rules</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Diagnosis</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
