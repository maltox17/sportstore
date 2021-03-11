    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="<?= base_url ?>">
                <img src="<?= base_url ?>assets/img/camiseta.png" height="30" alt="" loading="lazy" />
                SportStore
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php while ($cat = $categorias->fetch_object()) : ?>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url ?>/categoria/ver&id=<?= $cat->id ?>"><?= $cat->nombre ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 2%;">

                    <?php if (!isset($_SESSION['identity'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url ?>usuario/login">
                                <i class="fas fa-sign-in-alt pr-4 text-primary "></i> Ingresar</a>
                        </li>
                    <?php endif; ?>

                    <!-- Navbar dropdown -->
                    <?php if (isset($_SESSION['identity'])) : ?>
                        <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user pr-5 text-primary"></i>
                                <?= $_SESSION['identity']->nombre ?>
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
                                <?php if (isset($_SESSION['admin'])) : ?>
                                    <li><a class="dropdown-item" href="<?= base_url ?>/categoria/index">Gestionar categorias</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url ?>/pedido/gestion">Gestionar pedidos</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url ?>/producto/gestion">Gestionar productos</a></li>
                                <?php endif; ?>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url ?>usuario/logout">
                                        <i class="fas fa-sign-out-alt pr-4 text-danger" style="padding-right: 2%;"></i>
                                        Cerrar Sesion
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php $stats = Utils::statsCarrito(); ?>
                        <li class="nav-item m-auto">

                            <a class="nav-link" href="<?= base_url ?>carrito/index" role="button">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge rounded-pill badge-notification bg-danger mb-2"><?= $stats['count'] ?></span>
                            </a>

                </ul>
            <?php endif; ?>

            <!-- Left links -->

            <!-- Search form -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->