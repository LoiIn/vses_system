<nav class="navbar fixed-top navbar-expand-lg bg-header border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">VSES - Hệ thống xác định tốc độ giao thông</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item">
                        <img class="avatar" src="{{ asset('./storage/images/logo.jpg') }}" alt="">
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Lịch sử</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
