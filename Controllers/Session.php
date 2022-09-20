<?php 
class Session{
    public function __construct(){
        session_start();
        //$this->checkUser(); 
    }

    public function checkUser(){
        if(empty($_SESSION["usuario"])){
            require_once("Models/SessionModel.php");
            $session = new SessionModel();
            $result = $session->getExtistsProfesional();
            if ($result == 0){
                header("Location: ".base_url()."registrar");
                die();
            }else{
                header("Location: ".base_url()."login");
                die();
            }
        }
    }
    
    public function logOut(){
        session_destroy();
        header("Location: ".base_url());
        die();
    }

    public function newSession(array $user){
        $_SESSION["usuario"] = $user[0];
        $_SESSION["rol"] = $user[1];
    }
}