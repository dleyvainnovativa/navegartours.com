<div class="tab-pane fade show" id="pills-experiences" role="tabpanel" aria-labelledby="pills-experiences-tab" tabindex="0">
    <div class="py-2">

        <h2 class="py-2">Experiencias</h2>

        <div class="row g-4">
            @foreach ($boat["experiences"] as $experience)

            <div class="col-12 col-md-6">
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
                            <div class="col-auto my-auto">
                                <button class="btn btn-primary add-experience" onclick="addExperience({{ json_encode($experience['id']) }}, {{ json_encode($experience['name']) }})"><i class="fa fa-solid fa-plus"></i></button>
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
</div>