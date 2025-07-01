<style>
    #home::before {
        background-image: url("{{asset('assets/img/background.webp')}}");
    }
</style>
<!-- Hero Section -->
<section class="text-white h-100" id="home">
    <div class="container h-100 align-content-center" id="hero-content">
        <div class="mb-4 col-12 col-md-7">
            <h1 class="title py-2">Donde la tierra termina, la diversión comienza.</h1>
            <p class="lead py-2">Descubre nuestro servicio premium de alquiler de yates para vivir travesías inolvidables por las islas más emblemáticas de Veracruz.</p>
            <a href="{{ env('APP_URL')}}#boats" class="btn btn-primary">Nuestras embarcaciones</a>
        </div>
        <div class="card p-3">
            <div class="card-body">
                <form class="needs-validation" action="search" method="post">
                    <div class="row g-2">
                        <div class="col-12 col-md-3">
                            <label for="validationCustom01" class="form-label">Ubicación</label>
                            <select class="form-control" name="location" id="search_location" required>
                                <option selected value="veracruz">Veracruz</option>
                            </select>
                            <div class="invalid-feedback">
                                No puede estar vacía la ubicación
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="validationCustom01" class="form-label">Fecha de reserva</label>
                            <input class="form-control" min="{{$today}}" max="{{$max}}" value="{{$today}}" type="datetime-local" name="date" id="search_date" required>
                            <div class="invalid-feedback">
                                No puede estar vacía la fecha
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="validationCustom01" class="form-label">Número de tripulantes</label>
                            <input class="form-control" type="number" min="0" max="30" name="capacity" id="search_people" required>
                            <div class="invalid-feedback">
                                No puede estar vacío el número de huéspedes
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="validationCustom01" class="form-label">&#8192;</label>
                            <button class="btn btn-primary form-control">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>