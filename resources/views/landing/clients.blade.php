<!-- Servicios -->
<section class="py-4 mb-5">
    <div class="container py-4 mb-4" id="clients">
        <div class="py-4 text-center">
            <h1 class="">Nuestro clientes dicen</h1>
            <div class="row">
                <div class="col-12 col-md-12">
                    <p class="lead text-muted">Conoce las opiniones de nuestros clientes satisfechos sobre sus experiencias inolvidables con NavegarTours</p>
                </div>
            </div>
        </div>
        <div class="row text-start g-4">
            @foreach ($reviews as $review)

            <div class="col-12 col-md-4">
                <div class="card p-3 card-shadow">
                    <div class="card-body">
                        <h5 class="card-title text-warning">
                            <i class="fa fa-solid fa-star"></i>
                            <i class="fa fa-solid fa-star"></i>
                            <i class="fa fa-solid fa-star"></i>
                            <i class="fa fa-solid fa-star"></i>
                            <i class="fa fa-solid fa-star"></i>
                        </h5>
                        <p class="card-text">"{{$review['review']}}"</p>
                        <div class="row">
                            <!-- <div class="col-auto my-auto">
                                <img src="..." class="rounded-circle bg-secondary" alt="...">

                            </div> -->
                            <div class="col-auto">
                                <p class="p-0 my-0">{{$review['client']}}</p>
                                <p class="p-0 my-0 text-body-secondary">{{$review['client_description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>