<nav class="navbar navbar-expand-lg p-0 fixed-top mb-5">
    <div class="container-fluid">
        <a class="navbar-brand p-0 ms-5" href="{{route('home.index')}}">
            <img src="{{ asset('images/logo1.png') }}" class="img-fluid img-responsive" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Ventes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Locations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.login') }}" id="loginLink" class=" login-button nav-link">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('auth.register')}}" class=" signup-button nav-link " >S'inscrire</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
