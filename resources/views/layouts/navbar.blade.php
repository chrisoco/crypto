<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('portfolio') }}">Crypto</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2">{{ auth()->user()->email }}</span><i class="fa-solid fa-user-gear"></i><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu mt-md-2">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{ { route('profile') }}">Profile</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{ { route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="{{ __('Logout') }}">
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
