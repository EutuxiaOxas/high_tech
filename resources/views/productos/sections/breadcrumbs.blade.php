<div class="row">
    <span class="col-auto">
        <a class="text-info" href="{{route('products')}}">
            Productos
        </a>
        @if (isset($slug))
        ->
            @switch($slug)
                @case('automotriz')
                <a class="text-dark" href="/categorias/serie-automotriz">
                    Serie Automotriz
                </a>
                    @break
                @case('6000')
                <a class="text-dark" href="/categorias/serie-6000">
                    Serie 6000
                </a>
                    @break
                @case('moto')
                <a class="text-dark" href="/categorias/serie-moto">
                    Serie Moto
                </a>
                    @break
                @case('chumacera')
                <a class="text-dark" href="/categorias/chumaceras">
                    Serie Chumaceras
                </a>
                    @break
                @case('cadenas')
                    <a class="text-dark" href="/categorias/serie-cadenas">
                        Serie Cadenas
                    </a>
                    @break
                @default

            @endswitch

        @else

        @endif
    </span>
    <span class="col-auto ml-auto cursor-pointer d-md-none" id="searchButtonMobile">
        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 0 24 24" width="28px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
    </span>
</div>
