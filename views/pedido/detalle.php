<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="row">
                    <div class="col">

                        <h4 class="card-title mt-3 text-center">Detalle del pedido</h4>
                        <div class="p-4">

                            <p><strong>Numero del pedido:</strong> <?= $pedido->id ?> </p>
                            <p><strong>Coste total:</strong> <?= $pedido->coste ?>$ </p>
                            <p><strong>Estado:</strong> <?= Utils::showStatus($pedido->estado) ?> </p>
                            <p><strong>Direccion de envio:</strong> <?= $pedido->direccion ?>, <?= $pedido->localidad ?>, <?= $pedido->provincia ?>. </p>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <h5 class="mt-5">Cambiar estado del pedido</h5>
                                <form action="<?= base_url ?>/pedido/estado" method="POST">
                                    <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
                                    <select class="form-select form-select-lg mb-3 w-50 mt-2" aria-label=".form-select-lg example" name="estado">
                                        <option selected>Estado</option>
                                        <option value="confirm">pendiente</option>
                                        <option value="preparation">En preparacion</option>
                                        <option value="ready">preparado para enviar</option>
                                        <option value="delivered">enviado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Cambiar estado</button>

                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>


                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Unidades</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($pro = $productos->fetch_object()) : ?>
                                <tr>
                                    <th scope="row"><img width="50px" height="50px" src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>"></th>
                                    <td><?= $pro->nombre ?></td>
                                    <td><?= $pro->precio ?>$</td>
                                    <td><?= $pro->unidades ?></td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php while ($producto = $productos->fetch_object()) : ?>
    <ul>
        <li><img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="" width="50px" height="50px">
            <?= $producto->nombre ?> - Precio: <?= $producto->precio ?>$ - Cantidad: <?= $producto->unidades ?> </li>
    </ul>
<?php endwhile; ?>