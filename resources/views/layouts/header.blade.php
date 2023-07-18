<header class="app-header border-bottom border-light-primary">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="#">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="#">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a class="nav-link" href="javascript:void(0)">
                    <form action="/" method="GET">
                        @csrf
                        <div class="customize-input">
                            <input class="form-control custom-shadow custom-radius border-0 bg-light-gray"
                                   type="search" placeholder="Search" name="search" aria-label="Search">
                            <i class="form-control-icon" data-feather="search"></i>
                        </div>
                    </form>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        @auth
                            <img src="/assets/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="40">
                            <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span>
                                <span class="">
                                    {{auth()->user()->name}}
                                </span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                        @endauth
                        @guest
                            <img src="/assets/images/profile/user-1.jpg" alt="user" class="rounded-circle"
                                 width="40">
                            <span class="ms-2 d-none d-lg-inline-block">
                                <span class="text-dark">Convidado</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                        @endguest
                    </a>
                    @auth
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="{{ route('profile.show') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">Perfil</p>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                       class="btn btn-outline-primary mx-3 mt-2 d-block"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Logout</a>
                                </form>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="/login" class="btn btn-outline-primary mx-3 mt-2 d-block">Entrar</a>
                                <a href="/register" class="btn btn-outline-primary mx-3 mt-2 d-block">Registrar</a>
                            </div>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    </nav>
</header>



