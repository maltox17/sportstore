
    <div class="container mt-5 principal">
    
    <?php if(isset($pro)): ?>
        
        <h2 class="text-center m-5"><?=$pro->nombre?></h3>

    <?php else: ?>
       El producto no existe
    <?php endif; ?>
    
    <div class="row">

            <div class="col-md-4 m-auto">
                <div class="card">
                    <?php if($pro->imagen != null):?>
                        <img src="<?= base_url ?>/uploads/images/<?= $pro->imagen ?>" class="card-img-top" id="imageShirt" alt="..." height="300px" width="300px" />
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= $pro->nombre ?></h5>
                        <p class="card-text">
                            <?= $pro->descripcion ?>
                        </p>
                        <p class="text-success"><?= $pro->precio ?>$</p><a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

    </div>
</div>