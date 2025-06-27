<!-- Servicios -->
<section class="py-4">
    <div class="container py-4" id="places">
        <div class="py-4 text-center">
            <h1 class="">Experiencias populares</h1>
            <div class="row">
                <div class="col-12 col-md-12">
                    <p class="lead text-muted">Explora las costas e islas más impresionantes de Veracruz y ten la mejor experiencia para tus eventos especiales</p>
                </div>
            </div>
        </div>
        <div class="row text-start g-4">
            @foreach ($experiences as $experience)


            <div class="col-12 col-md-4">
                <div id="carouselCard{{$experience['id']}}" class="carousel slide card text-bg-dark">
                    <div class="carousel-inner">
                        @foreach ($experience["gallery"] as $key => $gallery)

                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img src="{{asset('assets/img/experiences/').'/'.$gallery}}" class="card-img experience-card-img" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <div class="card-img-overlay">
                        <div class="row">
                            <div class="col-auto col-md-auto">
                                <h2 class="card-title">{{$experience["name"]}}</h2>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCard{{$experience['id']}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCard{{$experience['id']}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>