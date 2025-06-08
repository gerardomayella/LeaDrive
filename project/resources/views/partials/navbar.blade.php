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
                    <button class="nav-link active text-orange fw-bold me-3" onclick="window.location.href='/dashboard'" style="background: none; border: none; padding: 0; cursor: pointer; text-decoration: underline;">
                        Home
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link text-orange fw-bold me-3" onclick="window.location.href='/jadwalSaya'" style="background: none; border: none; padding: 0; cursor: pointer;">
                        Jadwal Saya
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link text-orange fw-bold me-3" onclick="window.location.href='/profile'" style="background: none; border: none; padding: 0; cursor: pointer;">
                        My Profile
                    </button>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-orange fw-bold me-3" style="background: none; border: none; padding: 0; cursor: pointer; text-align: left;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
