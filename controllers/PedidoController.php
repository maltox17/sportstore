<?php
require_once 'models/PedidoModel.php';

class pedidoController{
    
    public function hacer() {
        require_once 'views/pedido/hacer.php';

    }

    public function add(){

        if(isset($_SESSION['identity'])){

            $usuario_id= $_SESSION['identity']->id;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;


            //Guardar datos en bd
            if($provincia && $localidad && $direccion){

                $pedido = new PedidoModel();
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setUsuarioId($usuario_id);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if($save && $save_linea){
                    $_SESSION['pedido'] = "complete";

                }else{
                    $_SESSION['pedido'] = 'failed';
                }
            }

            header("location:".base_url.'pedido/confirmado');

        }else{
            //redirigir al index
            header("location:".base_url);
        }
    }

    public function confirmado(){

        if(isset($_SESSION['identity'])){

            $identity = $_SESSION['identity'];
            $pedido = new PedidoModel();
            $pedido->setUsuarioId($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new PedidoModel();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);

        }
        
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new PedidoModel();
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            //Sacar el pedido
            $pedido = new PedidoModel();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los productos
            $pedido_productos = new PedidoModel();
            $productos = $pedido_productos->getProductosByPedido($id);
            
            require_once 'views/pedido/detalle.php';

        }else{
            header("location:".base_url.'pedido/mis_pedidos');
        }
        
    }

    public function gestion(){
        Utils::isAdmin();

        $gestion = true;

        $pedido = new PedidoModel();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function estado(){
        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            
            //Recoger datos del formulario
            $id = $_POST['pedido_id'];
            $status = $_POST['estado'];

            //Update del pedido
            $pedido = new PedidoModel();
            $pedido->setId($id);
            $pedido->setEstado($status);
            $pedido->updateOne();

            header("location:".base_url."pedido/detalle&id=".$id);
        }else{
            header("location:".base_url);
        }
    }
}