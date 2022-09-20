<?php
    class Registrar extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function registrar(){
            $this->views->getView($this, "registrar");
        }

        public function insertar(){
            $error= false;
            $usuario = array();
            $profesional = array();

            empty($_POST["txtusuario"]) ? $error = true : array_push($usuario, $_POST["txtusuario"]);
            empty($_POST["txtcontrasena"]) ? $error = true : array_push($usuario, $_POST["txtcontrasena"]);

            empty($_POST["txtnombre"]) ? $error = true : array_push($profesional, $_POST["txtnombre"]);
            empty($_POST["txtapellido"]) ? $error = true : array_push($profesional, $_POST["txtapellido"]);
            empty($_POST["txtestado"]) ? $error = true : array_push($profesional, $_POST["txtestado"]);
            empty($_POST["txtcorreo"]) ? $error = true : array_push($profesional, $_POST["txtcorreo"]);
            empty($_POST["txttelefono"]) ? $error = true : array_push($profesional, $_POST["txttelefono"]);

            $estado = false;
            
            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $idUsuario = $this->model->crearUsuario($usuario);
                if($idUsuario > 0){
                    array_push($profesional, $idUsuario);
                    $profesional = $this->model->crearProfesional($profesional);
                    if($profesional > 0){
                        $profesional = $this->model->crearAgenda($profesional);  
                        array_push($usuario, "doctor");                    
                        require_once('Controllers/Session.php');
                        $session = new Session();
                        $session->newSession($usuario);
                        $estado = true;
                        echo $estado;
                    }
                }
            }
        }
    }