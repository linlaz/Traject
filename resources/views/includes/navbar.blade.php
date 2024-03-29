<nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Traject</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item mx-md-2"><a href="{{url('/')}}" class="nav-link {{ Request::is('/') ? 'active' : ''}}">Home</a></li>
            <li class="nav-item mx-md-2"><a href="{{url('/package')}}" class="nav-link {{ Request::is('package/*') || Request::is('package') ? 'active' : ''}}">Package</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('service/*') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/hotel">Hotel</a></li>
                </ul>
            </li>
            <li class="nav-item mx-md-2"><a href="#" class="nav-link">Blog</a></li>
            @auth
            @if (Auth::user()->roles == 'ADMIN'||Auth::user()->roles == 'mitra')
                <li class="nav-item mx-md-2"><a href="{{url('/admin')}}" class="nav-link">Dashboard</a></li>
            @else
                <li class="nav-item mx-md-2"><a href="{{ route('profile.show') }}" class="nav-link {{ Request::is('user/*') ? 'active' : ''}}">Account</a></li>
            @endif
                <li>
                    <form class="" action="{{url('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-login px-5 py-2" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <button class="btn btn-login px-4 py-2 mx-md-2" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';">Login</button>
                    <button class="btn btn-secondary" type="button" onclick="event.preventDefault(); location.href='{{url('register')}}';">Register</button>
                </li>
            @endguest
        </ul>
    </div>
</nav>
