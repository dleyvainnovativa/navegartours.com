@extends('main')

@section('content')

@include("boat.welcome")

<style>
    #boat-bg::before {
        background-image: url("{{asset('assets/img/boats/').'/'.$boat['gallery'][0]}}");
    }
</style>

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
                            <div class="card-body">
                                <i class="fa fa-solid fa-ruler text-primary"></i>
                                <p class="my-0 text-muted small">Longitud</p>
                                <p class="my-0 fw-bold ">{{$boat["length"]}}</p>
                            </div>
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
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Selecciona el día</label>
                                    <input type="datetime-local" value="{{$today}}" name="date" class="form-control" required id="book-date">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Número de viajeros</label>
                                    <input class="form-control" id="book-passengers" value="2" type="number" min=1 max={{$boat['capacity']}} required>
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
                            <button class="btn btn-outline-secondary form-control">Llama +1 (555) 123-4567</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection