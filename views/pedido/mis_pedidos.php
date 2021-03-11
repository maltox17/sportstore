<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <?php if (isset($gestion)) : ?>
                            <h4 class="card-title mt-3 text-center">Gestionar Pedidos</h4>
                        <?php else : ?>
                            <h4 class="card-title mt-3 text-center">Mis Pedidos</h4>
                        <?php endif; ?>

                    </div>
                </div>


                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Numero</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Fecha</th>
                                <?php if (isset($gestion)) : ?>
                                    <th scope="col">Estado</th>
                                <?php endif; ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ped = $pedidos->fetch_object()) : ?>
                                <tr>
                                    <th scope="row"><a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>" class="text-decoration-none cursor-pointer"><?= $ped->id ?></a></th>
                                    <td><?= $ped->coste ?>$</td>
                                    <td><?= $ped->fecha ?></th>
                                    <?php if (isset($gestion)) : ?>
                                        <td><?=Utils::showStatus($ped->estado)?></td>
                                    <?php endif; ?>
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