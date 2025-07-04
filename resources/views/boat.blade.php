@extends('main')

@section('content')

@include("boat.welcome")

<style>
    #boat-bg::before {
        background-image: url("{{asset('assets/img/boats/').'/'.$boat['gallery'][0]}}");
    }
</style>

<script>
    let reservations = @json($reservations);
    window.reservations = reservations;
</script>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa fa-solid fa-person text-primary"></i>
                                <p class="my-0 text-muted small">Capacidad</p>
                                <p class="my-0 fw-bold ">Max. {{$boat["capacity"]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa fa-solid fa-money text-primary"></i>
                                <p class="my-0 text-muted small">Costo /hora</p>
                                <p class="my-0 fw-bold ">{{$boat["price"]}} MXN</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="fa fa-solid fa-clock text-primary"></i>
                                <p class="my-0 text-muted small">Renta Min.</p>
                                <p class="my-0 fw-bold ">{{$boat["min"]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <button data-bs-toggle="offcanvas" data-bs-target="#gallery" aria-controls="gallery" class="card-body btn btn-outline-primary">
                                <i class="fa fa-solid fa-camera"></i>
                                <p class="my-0 small">Galería</p>
                                <p class="my-0 fw-bold ">{{sizeof($boat["gallery"])}}</p>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-pills my-3 w-100 bg-light rounded" id="steps-tab" role="tablist">
                    <li class="nav-item p-2 col-6 col-md-3" role="steps">
                        <button class="nav-link active w-100" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="true">Info</button>
                    </li>
                    <li class="nav-item p-2 col-6 col-md-3" role="steps">
                        <button class="nav-link w-100" id="pills-routes-tab" data-bs-toggle="pill" data-bs-target="#pills-routes" type="button" role="tab" aria-controls="pills-routes" aria-selected="false">Rutas</button>
                    </li>
                    <li class="nav-item p-2 col-6 col-md-3" role="steps">
                        <button class="nav-link w-100" id="pills-included-tab" data-bs-toggle="pill" data-bs-target="#pills-included" type="button" role="tab" aria-controls="pills-included" aria-selected="false">¿Qué incluye?</button>
                    </li>
                    <li class="nav-item p-2 col-6 col-md-3" role="steps">
                        <button class="nav-link w-100" id="pills-experiences-tab" data-bs-toggle="pill" data-bs-target="#pills-experiences" type="button" role="tab" aria-controls="pills-experiences" aria-selected="false">Experiencias</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @include("boat.overview")
                    @include("boat.routes")
                    @include("boat.included")
                    @include("boat.experiences")
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center py-2">
                            <small>Desde</small>
                            <h2>{{$boat["price"]}} MXN</h2>
                            <p>por hora</p>
                            <div id="experience_list">
                            </div>
                        </div>
                        <hr>
                        <div class="py-2">
                            <form class="needs-validation">
                                <input type="hidden" value="{{$boat['name']}}" id="book-boat">
                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Selecciona el día</label>
                                    <input type="datetime-local" value="{{$today}}" name="date" class="form-control" required id="book-date">
                                    <div id="reservation-error" style="color: red; display: none;">That date/time is already reserved.</div>

                                </div> -->
                                <div class="mb-3">
                                    <label for="book-date" class="form-label">Selecciona fecha</label>
                                    <input type="text" id="book-date" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label for="book-time" class="form-label">Selecciona horario</label>
                                    <select id="book-time" class="form-control" required>
                                        <option value="">Escoge una fecha primero</option>
                                    </select>
                                </div>

                                <div id="reservation-error" class="text-danger mt-2" style="display:none;"></div>



                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Número de viajeros</label>
                                    <input class="form-control" id="book-passengers" value="2" required type="number" min=1 max={{$boat['capacity']}} required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rutas</label>
                                    <select class="form-control" name="passengers" id="book-route" required>
                                        <option value="1">Ruta 1</option>
                                        <option value="2">Ruta 2</option>
                                        <option value="3">Ruta 3</option>
                                        <option value="3">Ruta 4</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <a id="book-btn" onclick="book(event)" type="submit" class="form-control btn btn-primary">Reserva ahora</a>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="py-2 text-center">
                            <p class="text-muted">¿Necesitas ayuda?</p>
                            <a href="tel:{{env('CLIENT_PHONE')}}" class="btn btn-outline-secondary form-control">Llama {{env('CLIENT_PHONE_FORMAT')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("boat.gallery")

@endsection