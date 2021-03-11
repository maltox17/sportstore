<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title mt-3 text-center">Gestionar Productos</h4>
                    </div>
                    <span class="col-md-6 text-center mr-auto mt-3">
                        Crear Producto
                        <a class="btn btn-success btn-sm px-3 ml-1 mt-1" style="width: 14%;" href="<?= base_url ?>producto/crear">
                            <i class="fas fa-plus-square text-center"></i>
                        </a>
                    </span>
                </div>


                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($pro = $productos->fetch_object()) : ?>
                                <tr>
                                    <th scope="row"><?= $pro->id ?></th>
                                    <td><?= $pro->nombre ?></td>
                                    <td><?= $pro->precio ?></th>
                                    <td><?= $pro->stock ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm px-3" href="<?=base_url?>producto/edit&id=<?=$pro->id?>">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm px-3" href="<?=base_url?>producto/delete&id=<?=$pro->id?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">

            
            <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
                <div class="alert alert-success mb-0 alert-dismissible alert-absolute fade show " id="alertE" role="alert" data-mdb-color="secondary">
                    <i class="fas fa-check me-2"></i>
                    Producto creado correctamente
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
                <div class="alert alert-danger mb-0 alert-dismissible alert-absolute fade show " id="alertE" role="alert" data-mdb-color="secondary">
                    <i class="fas fa-check me-2"></i>
                    Hubo un error, revisa los datos
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php Utils::deleteSession('producto'); ?>

            <?php if (isset($_SESSION['ProductoDelete']) && $_SESSION['ProductoDelete'] == 'done') : ?>
                <div class="alert alert-success mb-0 alert-dismissible alert-absolute fade show " id="alertE" role="alert" data-mdb-color="secondary">
                    <i class="fas fa-check me-2"></i>
                    Producto Borrado Correctamente
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (isset($_SESSION['ProductoDelete']) && $_SESSION['ProductoDelete'] == 'failed') : ?>
                <div class="alert alert-danger mb-0 alert-dismissible alert-absolute fade show " id="alertE" role="alert" data-mdb-color="secondary">
                    <i class="fas fa-check me-2"></i>
                    No se pudo borrar el producto
                    <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php Utils::deleteSession('ProductoDelete'); ?>

        </div>
    </div>
    </div>
</div>


<script>
    mdb.Alert.getInstance(document.getElementById("alertE")).update({
        position: "top-right",
        delay: 3000,
        autohide: true,
        width: "500px",
        offset: 20,
        stacking: false,
        appendToBody: false,
    });

    mdb.Alert.getInstance(document.getElementById("alertE")).update({
        position: "top-right",
        delay: 3000,
        autohide: true,
        width: "500px",
        offset: 20,
        stacking: false,
        appendToBody: false,
    });
</script>