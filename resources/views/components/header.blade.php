<header class="navbar navbar-expand-lg fixed-top bg-transparent navbar-dark" id="header" aria-label="Eighth navbar example">
    <div class="container" id="main-header">
        <a class="navbar-brand" href="{{ env('APP_URL')}}">
            <img id="header-img" src="{{asset('assets/img/logo2.png')}}" height="150" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center mx-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ env('APP_URL')}}#services">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ env('APP_URL')}}#boats">Embarcaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ env('APP_URL')}}#places">Experiencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ env('APP_URL')}}#contact">Contacto</a>
                </li>
            </ul>
            <div class="">
                <a href="{{ env('APP_URL')}}#contact" class="btn btn-outline-light" id="contact_btn">Contáctanos</a>
                <a class="btn btn-primary" href="{{ env('APP_URL')}}#boats">Reserva</a>
            </div>
        </div>
    </div>
</header>