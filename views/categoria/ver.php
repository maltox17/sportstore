

    <div class="container mt-5 principal">
    
    <?php if(isset($categoria)): ?>
        
        <h2 class="text-center m-5">Categoria <?=$categoria->nombre?></h3>
        <?php if($productos->num_rows == 0): ?>
                <h6 class="text-center m-5">Lo siento, esta categoria no tiene productos</h6>
        <?php else: ?>

        <?php endif;?>
    <?php else: ?>
       La categoria no existe
    <?php endif; ?>
    
    <div class="row row-cols-1 row-cols-lg-3 g-4 mb-5">
        <?php while ($pro = $productos->fetch_object()) : ?>
            <div class="col mb-5">
                <div class="card">
                    <a class="text-decoration-none" href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
                    <?php if($pro->imagen != null):?>
                        
                        <img src="<?= base_url ?>/uploads/images/<?= $pro->imagen ?>" class="card-img-top" id="imageShirt" alt="..." height="300px" width="300px" />
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png">
                    <?php endif; ?>
                    </a>

                    <div class="card-body">
                        <a class="text-decoration-none" href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
                            <h5 class="card-title"><?= $pro->nombre ?></h5>
                        </a>
                        <p class="card-text">
                            <?= $pro->descripcion ?>
                        </p>
                        <p class="text-success"><?= $pro->precio ?>$</p><a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>