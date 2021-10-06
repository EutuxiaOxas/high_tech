@isset($categoria)
    <!-- PDF download -->
    <div class="row">
        <div class="card text-center bg-light mx-1">
            <div class="card-header px-1">
                Ficha técnica - <strong>{{ $categoria->category }}</strong>
            </div>
            <div class="card-body">
            <a href="{{ Storage::url($categoria->pdf) }}" target="_blank" class="btn btn-info btn-sm">Descargar</a>
            </div>
            <div class="card-footer text-muted px-1">
            Pdf con todas las caracteristicas de nuestros productos
            </div>
        </div>
    </div>
@endisset
<!-- Formulario -->
<div class="row">
    <div class="col-12 mb-2">
        Solicitud de información
    </div>
    <form class="col-12">
        <div class="form-group">
            <label for="exampleFormControlInput1">Correo electrónico</label>
            <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Serie a consultar</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                <option>Serie Automotriz</option>
                <option>Serie Industrial</option>
                <option>Serie Moto</option>
                <option>Serie Chumacera</option>
                <option>Serie Cadenas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mensaje</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-sm px-4">Enviar</button>
        </div>
    </form>
</div>
<hr>
<!-- Newslater -->
<div class="row">
    <div class="form-group col-12">
        <h6>Suscribete</h6>
        <input type="email" class="form-control form-control-sm" id="inputSubscriber" placeholder="Tú correo electrónico">
    </div>
    <div class="form-group col-12">
        <button class="btn btn-info btn-sm" style="width:100%;" id="buttonSubmitSubscriber">Suscribirme</button>
    </div>
</div>
