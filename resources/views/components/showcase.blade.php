
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->

    <div class="showcaseSection">
        <div class="showcaseChest" id="{{$number}}">
            <svg viewBox="0 0 300 400">
               @php
               echo html_entity_decode($svg);
               @endphp
            </svg>
        </div>
        <div class="showcaseOverlay" id="{{$number}}Overlay">
            <h1>{{$titulo}}</h1>
            <p>{{$descripcion}}</p>
            <h2>{{$autor}}</h2>
        </div>
    </div>
