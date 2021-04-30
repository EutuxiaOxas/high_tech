<span>
    <a class="text-info" href="{{route('products')}}">
        Productos
    </a>
    @if (isset($slug))
    ->
        @switch($slug)
            @case('serie-automotriz')
            <a class="text-dark" href="/categorias/serie-automotriz">
                Serie Automotriz
            </a>
                @break
            @case('serie-6000')
            <a class="text-dark" href="/categorias/serie-6000">
                Serie 6000
            </a>
                @break
            @case('serie-moto')
            <a class="text-dark" href="/categorias/serie-moto">
                Serie Moto
            </a>
                @break
            @case('chumaceras')
            <a class="text-dark" href="/categorias/chumaceras">
                Chumaceras
            </a>
                @break
            @case('serie-cadenas')
                <a class="text-dark" href="/categorias/serie-cadenas">
                    Serie Cadenas
                </a>
                @break
            @default

        @endswitch

    @else

    @endif
</span>
