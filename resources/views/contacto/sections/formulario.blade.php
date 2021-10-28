<section class="bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <span class="eyebrow mb-1 text-dark">Ponte en contacto con nosotros</span>
            <h2>Estamos atentos a responderte cualquier duda que tengas.</h2>
        </div>
        </div>
        <div class="row">
        <div class="col">
            <form action="{{ route('mail.send.contact') }}" method="POST">
                @csrf
                <div class="form-row mb-1">
                    <div class="col-12 col-md">
                        <input type="text" class="form-control form-control-minimal" placeholder="Nombre*" name="name" required>
                    </div>
                    <div class="col-12 col-md">
                        <input type="text" class="form-control form-control-minimal" placeholder="Correo*" name="email" required>
                    </div>
                    <div class="col-12 col-md">
                        <input type="text" class="form-control form-control-minimal" placeholder="Teléfono de Contacto*" name="phone" required>
                    </div>
                </div>
                <div class="form-row mb-1">
                    <div class="col">
                        <textarea class="form-control form-control-minimal" rows="3" placeholder="Tu Mensaje*" name="message" required></textarea>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info px-5">Enviar</button>
                    </div>
                </div>
                <div>
                    <small class="text-muted mt-4">* Obligatorio</small>
                </div>
            </form>
        </div>
        </div>
    </div>
    </section>
