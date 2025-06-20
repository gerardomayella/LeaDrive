<nav class="navbar navbar-expand-lg navbar-dark" style="background: black; border-bottom: 3px solid purple;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="{{ asset('images/LeaDrive_noBackground.png') }}" alt="LeaDrive" style="height: 45px;">
            <span class="ms-2" style="font-weight: bold; color: white;">LeaDrive</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a href="/dashboard"
                        class="nav-link fw-bold me-3 {{ Request::is('dashboard') ? 'active text-orange' : 'text-orange' }}"
                        style="{{ Request::is('dashboard') ? 'text-decoration: underline;' : '' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/jadwalUser"
                        class="nav-link fw-bold me-3 {{ Request::is('jadwalUser*') ? 'active text-orange' : 'text-orange' }}"
                        style="{{ Request::is('jadwalUser*') ? 'text-decoration: underline;' : '' }}">
                        Jadwal Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile"
                        class="nav-link fw-bold me-3 {{ Request::is('profile') ? 'active text-orange' : 'text-orange' }}"
                        style="{{ Request::is('profile') ? 'text-decoration: underline;' : '' }}">
                        My Profile
                    </a>
                </li>
                <li class="nav-item">
                    <li class="nav-item">
                    <a href="#" class="nav-link fw-bold me-3 text-orange"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        style="{{ Request::is('logout') ? 'text-decoration: underline;' : '' }}"> 
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
