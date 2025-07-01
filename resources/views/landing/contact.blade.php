<!-- Servicios -->
<section class="py-4">
    <div class="container py-4" id="contact">
        <div class="py-4 text-start">
            <div class="row g-4">
                <div class="col-12 col-md-6 mb-4">
                    <h1 class="">Contáctanos</h1>
                    <p class="lead">¿Tienes preguntas sobre nuestros servicios de alquiler de yates? Nuestro equipo está aquí para ayudarte a planear el viaje perfecto.</p>
                    <div>
                        <div class="row">
                            <div class="col-12 col-md-auto my-auto">
                                <i class="rounded-circle bg-primary p-2 my-2  fa-solid fa-location-dot text-light"></i>
                            </div>
                            <div class="col-12 col-md-auto my-auto">
                                <p class="my-0 py-0">Ubicación</p>
                                <p class="my-0 py-0 text-muted">{{env('CLIENT_ADDRESS')}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-auto my-auto">
                                <i class="rounded-circle bg-primary p-2 my-2  fa-solid fa-phone text-light"></i>
                            </div>
                            <div class="col-12 col-md-auto my-auto">
                                <p class="my-0 py-0">Teléfono</p>
                                <p class="my-0 py-0 text-muted"><a href="tel:{{env('CLIENT_PHONE')}}">{{env('CLIENT_PHONE_FORMAT')}}</a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-auto my-auto">
                                <i class="rounded-circle bg-primary p-2 my-2  fa-solid fa-envelope text-light"></i>
                            </div>
                            <div class="col-12 col-md-auto my-auto">
                                <p class="my-0 py-0">Correo</p>
                                <p class="my-0 py-0 text-muted"><a href="mailto:{{env('CLIENT_MAIL')}}">{{env('CLIENT_MAIL')}}</a></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <!-- <div class="card p-2 card-shadow"> -->
                    <!-- <div class="card-body"> -->
                    <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.2911707399458!2d-96.10154590011356!3d19.09581676830922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3402fb59cc19f%3A0xcd54c2a7e752bd5b!2sClub%20Nautico%20El%20Dorado!5e0!3m2!1sen!2smx!4v1751076498117!5m2!1sen!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- <form class="needs-validation">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="contact_firstname" placeholder="Tu nombre">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="contact_firstname" placeholder="Tus apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
                                    <input type="phone" class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <div class=" mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class=" mb-3">
                                    <button class="btn btn-primary form-control">Enviar</button>
                                </div>
                            </form> -->
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</section>