<!-- Search Input -->
<form action="{{route('products.search.filter')}}">
    <div class="row mb-1">

        <div class="col-12 col-sm-8 col-md-6 col-lg-7 px-1 px-lg-2">
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="basic-addon2">
            </div>
            @if(isset($slug))
                @if ( $slug != 'serie-cadenas' && $slug != 'serie-chumacera')
                    <span class="text-info" style="cursor:pointer;" id="filtrarDimesiones">
                        Filtrar por dimensiones del rodamiento
                    </span>
                @endif
            @endif
        </div>
        <div class="col-12 col-sm-4 col-lg-3 px-1 px-md-2">
            <div class="form-group">

                @if(isset($slug))
                    @if ($slug == 'serie-automotriz')
                        <select class="form-control" name="rueda">
                            <option value="0">Posición de la rueda</option>
                            @foreach ($posicion_rueda as $posicion)
                                <option value="{{ $posicion->id }}">{{ $posicion->posicion }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_id" value="1">
                    @elseif($slug == 'serie-6000')
                        <select class="form-control" name="tipo_sello">
                            <option value="0">Tipo de sello</option>
                            @foreach ($tipo_sello as $sello)
                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_id" value="2">
                    @elseif($slug == 'serie-moto')
                        <select class="form-control" name="tipo_sello">
                            <option value="0">Tipo de sello</option>
                            @foreach ($tipo_sello as $sello)
                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_id" value="3">
                    @elseif($slug == 'serie-chumacera')
                        <select class="form-control" name="tipo_brida">
                            <option value="0">Tipo de brida</option>
                            @foreach ($tipo_chum as $chum)
                                <option value="{{ $chum->id }}">{{ $chum->tipo_chum }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_id" value="4">
                    @elseif($slug == 'serie-cadenas')
                        <select class="form-control" name="tipo_cadena">
                            <option value="0">Tipo de cadena</option>
                            @foreach ($tipo_cadena as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_cadena_texto }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_id" value="5">
                    @endif
                @else
                    <select class="form-control" name="category_id">
                        <option value="0">Seleccionar Serie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="no_slug" value="1">
                @endif

            </div>
        </div>
        <div class="col-12 col-md-2 px-1 px-md-2">
            <button type="submit" class="btn btn-info text-white px-1" style="width:100%;">
                Buscar
            </button>
        </div>

        <div class="col-12 px-1 px-md-2 hidden" id="containerDimensiones">
        </div>
    </div>
</form>

<div class="hidden" id="dimensionesInputsContainer">
    <div class="row">
        <div class="col-4">
            <label for="d_interno">Diametro Interno</label>
            <input type="text" class="form-control" name="d_interno" placeholder="En mm" id="d_interno" required>
        </div>
        <div class="col-4">
            <label for="d_externo">Diametro Externo</label>
            <input type="text" class="form-control" name="d_externo" placeholder="En mm" id="d_externo" required>
        </div>
        <div class="col-4">
            <label for="espesor">Espesor</label>
            <input type="text" class="form-control" name="espesor" placeholder="En mm" id="espesor" required>
        </div>
    </div>
</div>

<script>
    const filtrarDimesiones = document.getElementById('filtrarDimesiones');
    const containerDimensiones = document.getElementById('containerDimensiones');
    const dimensionesInputsContainer = document.getElementById('dimensionesInputsContainer');

    filtrarDimesiones.addEventListener('click', event => {

        if( containerDimensiones.classList.contains('hidden') ){
            // Clono los inputs
            inputsDimiensiones = dimensionesInputsContainer.firstElementChild.cloneNode(true);
            // agrego los inputs
            containerDimensiones.appendChild(inputsDimiensiones);
            // Muestro los inputs
            containerDimensiones.classList.add('block');
            // Elimino la clase hidden
            containerDimensiones.classList.remove("hidden");
        }else{
            containerDimensiones.innerHTML = '';
            containerDimensiones.classList.add('hidden');
            containerDimensiones.classList.remove("block");
        }

    })
</script>
