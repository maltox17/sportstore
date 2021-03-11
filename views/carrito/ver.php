<!--Section: Block Content-->
<section class="container">

    <!--Grid row-->
    <div class="row">

        <?php if (isset($_SESSION['carrito'])) : ?>
            <!--Grid column-->
            <div class="col-lg-8">

                <!-- Card -->
                <div class="mb-3 card mt-5 ml-5 p-3">
                    <div class="pt-4 wish-list">

                        <h5 class="mb-5 text-center">Carrito</h5>
                        <?php
                        foreach ($carrito as $indice => $elemento) :
                            $producto = $elemento['producto'];

                        ?>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <?php if ($producto->imagen != null) : ?>
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <img class="img-fluid" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="Sample">
                                        </div>
                                    <?php else : ?>
                                        <img src="<?= base_url ?>assets/img/camiseta.png">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5><a class="text-decoration-none" href="<?= base_url ?>/producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></h5>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <form method="POST" action="<?=base_url?>carrito/updateUnits&index=<?=$indice?>">
                                                    <input type="hidden" value="<?=$indice?>" name="index">
                                                    <input class="form-control" min="0" name="unidades" value="<?= $elemento['unidades'] ?>" type="number" style="width: 4rem;">
                                                    <button  class="btn btn-primary" style="margin-top: 5px; width: -87px;"><i class=" fas fa-sync-alt"></i></btn>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" type="button" class="card-link-secondary small text-uppercase mr-3 text-danger"><i class="fas fa-trash-alt mr-1 text-danger "></i> Eliminar </a>
                                            </div>
                                            <div style="padding: 3%;"><p class="mb-0 mr-3"><span><strong id="summary"><?= $producto->precio ?></strong></span></p class="mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                        <?php endforeach; ?>

                    </div>
                </div>

                <!-- Card -->
                <div class="mb-5 mt-5 card" style="height: auto;">
                    <div class="p-4 mb-5">
                        <h5 class="mb-4">We accept</h5>

                        <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
                        <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
                        <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
                        <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="mb-3 mt-5">
                    <div class="p-4 card">

                        <h5 class="mb-3">The total amount of</h5>

                        <ul class="list-group list-group-flush">
                            <?php $stats = Utils::statsCarrito(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Subtotal
                                <span><?= $stats['total'] ?>$</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total</strong>
                                </div>

                                <span><strong><?= $stats['total'] ?>$</strong></span>
                            </li>
                        </ul>

                        <a type="button" class="btn btn-primary btn-block" href="<?= base_url ?>pedido/hacer">go to checkout</a>

                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4">


                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->

            </div>

        <?php else : ?>
            <div class="card mh-50">
            <h2>Carrito Vacio</h2>
            </div>
        <?php endif; ?>


    </div>
    <!-- Grid row -->

</section>
<!--Section: Block Content-->