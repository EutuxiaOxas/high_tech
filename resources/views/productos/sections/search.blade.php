<!-- Search Input -->
<form action="{{route('products.search.filter')}}">
    <div class="row mb-1">

        <div class="col-6 col-sm-8 col-md-6 col-lg-7 px-1 px-lg-2">
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-3 px-1 px-mdlg-2">
            <div class="form-group">
                @if(isset($slug))
                    @if ($slug == 'serie-automotriz')
                        <select class="form-control" name="rueda">
                            @foreach ($posicion_rueda as $posicion)
                                <option value="{{ $posicion->id }}">{{ $posicion->posicion }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="auto" value="auto">
                        <input type="hidden" name="category_id" value="1">
                    @elseif($slug == 'serie-6000')
                        <select class="form-control" name="tipo_sello">
                            @foreach ($tipo_sello as $sello)
                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="6000" value="6000">
                        <input type="hidden" name="category_id" value="2">
                    @elseif($slug == 'serie-moto')
                        <select class="form-control" name="tipo_sello">
                            @foreach ($tipo_sello as $sello)
                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="moto" value="moto">
                        <input type="hidden" name="category_id" value="3">
                    @elseif($slug == 'chumaceras')
                        <select class="form-control" name="tipo_brida">
                            @foreach ($tipo_chum as $chum)
                                <option value="{{ $chum->id }}">{{ $chum->tipo_chum }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="chumaceras" value="chumaceras">
                        <input type="hidden" name="category_id" value="4">
                    @elseif($slug == 'serie-cadenas')
                        <select class="form-control" name="tipo_cadena">
                            @foreach ($tipo_cadena as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_cadena_texto }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="cadenas" value="cadenas">
                        <input type="hidden" name="category_id" value="5">
                    @endif
                @else
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="no_slug" value="1">
                @endif

            </div>
        </div>
        <div class="col-12 col-md-2 px-1 px-lg-2">
            <button type="submit" class="btn btn-info text-white px-1" style="width:100%;">
                Buscar
            </button>
        </div>
    </div>
</form>
