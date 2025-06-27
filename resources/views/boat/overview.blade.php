<div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab" tabindex="0">
    <div class="py-2">

        <h2 class="py-2">Acerca de esta embarcación</h2>
        <p>{{$boat["description"]}}</p>
    </div>
    @php
    $features = collect($boat["features"]);
    $half = ceil($features->count() / 2);
    $firstHalf = $features->slice(0, $half);
    $secondHalf = $features->slice($half);
    @endphp

    <div class="py-2">
        <h2 class="py-2">Características</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <ul>
                    @foreach ($firstHalf as $feature)
                    <li>
                        <p>{{ $feature }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <ul>
                    @foreach ($secondHalf as $feature)
                    <li>
                        <p>{{ $feature }}</p>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>