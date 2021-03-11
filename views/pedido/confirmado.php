<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <div class="container mt-5 mb-5">
        <div class="card p-5">
            <h2 class="text-center">Tu pedido se ha confirmado</h2>
            <?php if (isset($pedido)) : ?>
                <p>Numero de pedido: <?=$pedido->id?></p>
                <h5 class="mt-3">Productos del pedido:</h5>
            <?php endif; ?>
            <?php while($producto = $productos->fetch_object()): ?>
                <ul>
                    <li><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="" width="50px" height="50px"> 
                        <?=$producto->nombre?> - Precio: <?=$producto->precio?>$ - Cantidad: <?=$producto->unidades?> </li>
                </ul>
            <?php endwhile; ?>
        </div>

    </div>

<?php else : ?>

    <h1>Hubo un problema con tu pedido</h1>

<?php endif; ?>