<div class="tab-pane fade show" id="pills-routes" role="tabpanel" aria-labelledby="pills-routes-tab" tabindex="0">
    <div class="py-2">
        <h2 class="py-2">Conoce nuestras rutas</h2>
    </div>
    <div class="py-2">
        <div class="row g-4">
            @foreach ($boat["routes"] as $route)
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="position-absolute">
                        <span class="badge text-bg-warning p-2 m-2">{{$route["duration"]}} horas</span>
                    </div>
                    <div id="carousel-route-{{$route['id']}}" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($route["gallery"] as $key => $gallery)

                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img src="{{asset('assets/img/places/').'/'.$gallery}}" class="card-img-top" alt="...">
                            </div>
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-route-{{$route['id']}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-route-{{$route['id']}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$route["route"]}}</h5>
                        <h6 class="fw-bold">Paradas:</h6>
                        <div class="row py-2">
                            @php
                            $stops = collect($route["stops"]);
                            $half = ceil($stops->count() / 2);
                            $firstHalf = $stops->slice(0, $half);
                            $secondHalf = $stops->slice($half);
                            @endphp
                            <div class="col-6 col-md-6">
                                @foreach ($firstHalf as $key=> $stop)
                                <div class="row">

                                    <div class="col-auto">
                                        <span class="badge text-bg-success my-auto">{{$key +1}}</span>
                                        <span class=" my-auto">{{$stop}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-6 col-md-6">
                                @foreach ($secondHalf as $key=> $stop)
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="badge text-bg-success my-auto">{{$key +1}}</span>
                                        <span class=" my-auto">{{$stop}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <h6 class="fw-bold">Actividades:</h6>
                        <div class="row py-2">
                            @php
                            $activities = collect($route["activities"]);
                            $half = ceil($activities->count() / 2);
                            $firstHalf = $activities->slice(0, $half);
                            $secondHalf = $activities->slice($half);
                            @endphp
                            <div class="col-6 col-md-6">
                                @foreach ($firstHalf as $activity)
                                <p class="text-decoration-underline">{{$activity}}</p>
                                @endforeach
                            </div>
                            <div class="col-6 col-md-6">
                                @foreach ($secondHalf as $activity)
                                <p class="text-decoration-underline">{{$activity}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>