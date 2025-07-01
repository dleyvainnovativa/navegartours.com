<div class="offcanvas offcanvas-bottom rounded h-100" tabindex="-1" id="gallery" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header container">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Galería</h5>
        <a class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></a>
    </div>
    <div class="offcanvas-body small">
        <div class="container h-100">
            <div class="row g-4">
                @foreach ($boat["gallery"] as $key => $picture )
                <div class="col-12 col-md-12">
                    <div class="card">
                        <img src="{{asset('assets/img/boats/').'/'.$picture}}" class="card-img card-img-gallery" alt="...">
                        <div class="card-img-overlay">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
        <div class="container py-4">
            <div class="row g-1 justify-content-end">
                <div class="col-auto">
                    <a class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
</div>