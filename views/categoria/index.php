<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="row">
                <div class="col-md-6">
                <h4 class="card-title mt-3 text-center">Gestionar Categorias</h4>
                </div>
                <span class="col-md-6 text-center mr-auto mt-3">
                <a class="btn btn-success btn-sm px-3 ml-1 mt-1" style="width: 14%;" href="<?=base_url?>categoria/crear">
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
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($cat = $categorias->fetch_object()) : ?>
                                <tr>
                                    <th scope="row"><?= $cat->id ?></th>
                                    <td><?= $cat->nombre ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm px-3">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm px-3">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>





