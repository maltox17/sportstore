<div class="container mt-5">
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <div class="alert alert-success mb-0 alert-dismissible alert-absolute fade show " id="alertSuccess" role="alert" data-mdb-color="secondary">
            <i class="fas fa-check me-2"></i>
            Registro Completado
            <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <div class="alert alert-danger mb-0 alert-dismissible alert-absolute fade show " id="alertExample" role="alert" data-mdb-color="secondary">
            <i class="fas fa-check me-2"></i>
            Registro Fallido, Rellena bien los datos
            <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php endif; ?>
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <h4 class="card-title text-center mt-3">Regístrate</h4>
                <?php Utils::deleteSession('register'); ?>
                <div class="card-body">
                    <form action="<?= base_url ?>usuario/save" method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1" class="form-control" name='nombre' required />
                                    <label class="form-label" for="form3Example1">Nombre</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example2" class="form-control" name='apellidos' required />
                                    <label class="form-label" for="form3Example2">Apellidos</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control" required name='email' />
                            <label class="form-label" for="form3Example3">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form3Example4" class="form-control" required name='password' />
                            <label class="form-label" for="form3Example4">Contraseña</label>
                        </div>


                        <!-- Submit button -->
                        <div class="">
                            <button type="submit" class="btn btn-primary btn-block" value='Enviar'>Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    mdb.Alert.getInstance(document.getElementById("alertSuccess")).update({
        position: "top-right",
        delay: 3000,
        autohide: true,
        width: "500px",
        offset: 20,
        stacking: false,
        appendToBody: false,
    });

    mdb.Alert.getInstance(document.getElementById("alertExample")).update({
        position: "top-right",
        delay: 3000,
        autohide: true,
        width: "500px",
        offset: 20,
        stacking: false,
        appendToBody: false,
    });
</script>