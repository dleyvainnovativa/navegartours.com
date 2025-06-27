<div class="tab-pane fade show" id="pills-included" role="tabpanel" aria-labelledby="pills-included-tab" tabindex="0">
    <div class="py-2">

        <h2 class="py-2">¿Qué incluye tu viaje?</h2>
        @php
        $included = collect($boat["included"]);
        $half = ceil($included->count() / 2);
        $firstHalf = $included->slice(0, $half);
        $secondHalf = $included->slice($half);
        @endphp

        <div class="row g-4">


            <div class="col-12 col-md-6">
                <ul>
                    @foreach ($firstHalf as $include)
                    <li>
                        <p>{{$include}}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <ul>
                    @foreach ($secondHalf as $include)
                    <li>
                        <p>{{$include}}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>