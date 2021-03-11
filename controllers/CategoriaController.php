<?php

require_once 'models/CategoriaModel.php';
require_once 'models/ProductoModel.php';

class categoriaController{
    
    public function index() {
        Utils::isAdmin();
        $categoria = new CategoriaModel();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            
            //Guardar la categoria en bd
            $categoria = new CategoriaModel();
            $set= $categoria->setNombre($_POST['nombre']);
            $categoria->save();

        }
        header("location:".base_url."categoria/index");
        ob_end_flush();

    }

    public function ver(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Conseguir Categoria
            $categoria = new CategoriaModel();
            $categoria->setId($id);
            $categoria= $categoria->getOne();

            //Conseguir Productos
            $producto = new ProductoModel();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }


}