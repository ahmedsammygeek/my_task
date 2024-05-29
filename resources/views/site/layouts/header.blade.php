    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('site_assets/logo.svg') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}"> الغرف </a>
                    </li>

                    @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}"> الملف الشخصى </a>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}"> مستخدم جديد </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}"> تسجيل الدخول </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>