<?php
    class Login extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function login(){
            $this->views->getView($this, "login");
        }

        public function cerrarsession(){
            $session = new Session();
            $session->logOut();
        }

        public function nuevasession(){
            $nombre = $_POST["txtusuario"];
            $usuario = $this->model->getUser($nombre);
            if ($usuario){
                if($_POST["txtcontrasena"] == $usuario->contrasena){
                    $user = array();
                    array_push($user, $usuario->nombre, $usuario->contrasena, $usuario->rol, $usuario->id);
                    require_once('Controllers/Session.php');
                    $session = new Session();
                    $session->newSession($user);
                    echo true;
                }else{
                    echo 'Contraseña incorrecta';
                }
            }else{
                echo 'No existe el usuario';
            }
        }

        public function datosdesession(){
            $datosSession = $this->model->datosDeSession();
            print_r(json_encode($datosSession));
        }
    }