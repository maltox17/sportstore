<?php
require_once 'models/ProductoModel.php';

class carritoController
{

    public function index()
    {
        $carrito = $_SESSION['carrito'];


        require_once 'views/carrito/ver.php';
    }

    public function add()
    {
        if ($_GET['id']) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {

            //Conseguir producto
            $producto = new ProductoModel();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            //anadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }


    public function remove()
    {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }

    public function updateUnits()
    {

        if(isset($_POST['index']) && isset($_POST['unidades'])){
            $index = $_POST['index'];
            $unidades = $_POST['unidades'];
            $_SESSION['carrito'][$index]['unidades'] = $unidades;
        }
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }

    public function down()
    {
        if(isset($_GET['index'])){

            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            if($_SESSION['carrito'][$index]['unidades'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }

    public function up()
    {

        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("location:" . base_url . "carrito/index");
        ob_end_flush();
    }
}
