<?php
require_once 'models/ProductoModel.php';

class productoController{

    
    
    public function index() {
        $producto = new ProductoModel();
        $productos = $producto->getRandom(6);
        //renderizar vista
        require_once 'views/producto/principal.php';
    }

    public function gestion(){
        Utils::isAdmin();

        $producto = new ProductoModel();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $precio && $stock && $categoria){
				$producto = new ProductoModel();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header('Location:'.base_url.'producto/gestion');
        ob_end_flush();
	}

 

    public function delete(){

        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new ProductoModel();
            $producto->setId($id);

            $imagen = $producto->findImage($id);
            $producto->setImagen($imagen->imagen);

            
            if(file_exists('uploads/images/'.$producto->getImagen())){
                unlink('uploads/images/'.$producto->getImagen());
            }

            $delete = $producto->delete();

            
            $_SESSION['ProductoDelete'] = 'done';

        }else{
            $_SESSION['ProductoDelete']= 'failed';
        }

        header("location:".base_url."producto/gestion");
        ob_end_flush();


    }

    public function edit(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $producto = new ProductoModel();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/producto/editar.php';

        }else{
            header("location:".base_url."producto/gestion");
            ob_end_flush();
        }

        
    }

    public function ver(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];


            $producto = new ProductoModel();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/producto/ver.php';

        }
        
    }

    public function update(){
        
    }
}


