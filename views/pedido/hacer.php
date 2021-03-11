<?php if (isset($_SESSION['identity'])) : ?>

    <div class="container mb-5">
    <div class="py-5 text-center">
        <h1>Checkout</h1>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-5 card p-3">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-center">Carrito</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>


        </div>
        <div class="col-md-7 order-md-1 card p-3 mb-5" style="margin-right: 5%;">
            <h4 class="mb-3">Datos de envio</h4>
            <form class="needs-validation" novalidate="" action="<?=base_url.'pedido/add'?>" method="POST">


                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Calle, numero..." required="" name="direccion">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="zip">Provincia</label>
                        <input type="text" class="form-control" id="provincia" placeholder="Madrid" required="" name="provincia">
                        <div class="invalid-feedback">
                            Provincia es obligatorio
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="zip">Localidad</label>
                        <input type="text" class="form-control" id="zip" placeholder="Getafe" required="" name="localidad">
                        <div class="invalid-feedback">
                            localidad es obligatorio
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" >
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-5">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar Pedido</button>
            </form>
        </div>
    </div>


</div>
    
<?php else : ?>
    <h1>Necesitas estar identificado</h1>
<?php endif; ?>


