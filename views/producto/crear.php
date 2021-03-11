<?php $categorias = Utils::showCategorias(); ?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <div class="card">
                <h4 class="card-title text-center mt-3">Crear nuevo producto</h4>
                <div class="card-body">

                    <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data">


                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example2" class="form-control" name="nombre" required />
                            <label class="form-label" for="form1Example2">Nombre</label>
                        </div>



                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4" name="descripcion" required></textarea>
                            <label class="form-label" for="form4Example3">Descripción</label>
                        </div>
                        <div class="form-outline mb-4">
                            <select class="form-select" aria-label="Default select example" name="categoria_id">
                                <option selected disabled>Categoria</option>
                                <?php while ($cate = $categorias->fetch_object()) : ?>
                                    <option value="<?= $cate->id ?>"><?= $cate->nombre ?></option>
                                <?php endwhile;?>
                            </select>
                        </div>



                        <div class="form-outline mb-4">
                            <input type="number" id="form1Example2" class="form-control border rounded" name="precio" required />
                            <label class="form-label" for="form1Example2">Precio</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="number" id="form1Example2" class="form-control border rounded" name="stock" required />
                            <label class="form-label" for="form1Example2">Stock</label>
                        </div>

                        <div class="form-outline mb-4">
                            <label for="exampleFormControlFile1">Imagen</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                        </div>


                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block m-auto SubmitButton" id='SubmitButton' value="guardar">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

