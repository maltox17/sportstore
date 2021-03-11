<?php

require_once 'models/UsuarioModel.php';

class usuarioController{
    
    public function index() {
        echo 'Controlador Usuarios, Accion index';
    }

    public function login(){
        require_once 'views/usuario/login.php';
    }

    public function registro(){
        require_once 'views/usuario/registro.php';

    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;;
            $email = isset($_POST['email']) ? $_POST['email'] : false;;
            $password= isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $apellidos && $email && $password){
                $usuario = new UsuarioModel();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
    
                $save = $usuario->save();
    
                if($save){
                    $_SESSION['register']= 'complete';
                }else{
                    $_SESSION['register']= 'failed';
    
                }
            }else{
                $_SESSION['register']= 'failed';
            }


        }else{
            $_SESSION['register']= 'failed';
            
        }

        header("location:".base_url.'usuario/registro');

        //var_dump($usuario);

    }

    public function loginUser(){
        if(isset($_POST)){
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new UsuarioModel();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
               
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }

            }else{
                $_SESSION['error_login'] = 'identificacion Fallida';
            }

            //var_dump($identity);
            //die();
            //Crear una sesion

        }

        header("location:".base_url);

        
        

    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);

            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']);
                
            }
            
            
        }

        require_once 'views/usuario/logout.php';

             
    }
}