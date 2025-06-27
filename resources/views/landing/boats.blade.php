<!-- Barcos -->
<section class="py-4">
    <div class="container py-4" id="boats">
        <div class="py-4 text-start">
            <h1 class="">Nuestras embarcaciones</h1>
            <div class="row">
                <div class="col-12 col-md-6">
                    <p class="lead text-muted">Disfruta del máximo lujo y confort con nuestros completos servicios de renta de yates.</p>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{ env('APP_URL')}}#home">Reserva ahora</a>
                </div>
            </div>
        </div>
        <div class="row text-start g-4">
            @foreach ($boats as $boat)


            <div class="col-12 col-md-4">
                <div class="card card-shadow">
                    <img src="{{asset('assets/img/boats/').'/'.$boat['gallery'][0]}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$boat["name"]}}</h5>
                        <div class="d-flex flex-wrap gap-2 text-muted small mb-4">
                            <div class="d-flex align-items-center me-4">
                                <span class="fw-medium">Length:</span><span class="ms-1">{{$boat["length"]}}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="fw-medium">Capacity:</span><span class="ms-1">{{$boat["capacity"]}}</span>
                            </div>
                        </div>

                        <div class="row my-auto">
                            <div class="col-auto my-auto">
                                <h5 class="card-title">{{$boat["price"]}} MXN</h5>
                            </div>
                            <div class="col-auto my-auto">
                                <h6 class="text-muted">/ hora</h6>
                            </div>
                            <div class="col-auto ms-auto my-auto">
                                <a href="boat/{{$boat['id']}}" class="btn btn-outline-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>