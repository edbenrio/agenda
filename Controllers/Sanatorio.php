<?php
    class Sanatorio extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function sanatorio(){
            $sanatorio = $this->model->getSanatorios();
            $this->views->getView($this, "sanatorio", $sanatorio);
        }

        public function insertar(){
            
            $error= false;

            empty($_POST["txtnombre"]) ? $error = true : $sanatorio["txtnombre"] = $_POST["txtnombre"] ;
            empty($_POST["txtcorreo"]) ? $error = true : $sanatorio["txtcorreo"] = $_POST["txtcorreo"] ;
            empty($_POST["txtdireccion"]) ? $error = true : $sanatorio["txtdireccion"] = $_POST["txtdireccion"] ;
            empty($_POST["txtciudad"]) ? $error = true : $sanatorio["txtciudad"] = $_POST["txtciudad"] ;
            empty($_POST["txtbarrio"]) ? $error = true : $sanatorio["txtbarrio"] = $_POST["txtbarrio"] ;
            empty($_POST["txttelefono"]) ? $error = true : $sanatorio["txttelefono"] = $_POST["txttelefono"] ;
            empty($_POST["txtcelular"]) ? $error = true : $sanatorio["txtcelular"] = $_POST["txtcelular"] ;

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setSanatorio($sanatorio);
                echo $resultado;
            }
        }

        public function versanatorio($id){
            $data = $this->model->getSanatorio($id);
            $sanatorio = new stdClass;
            foreach ($data as $key => $value){
                $sanatorio->$key = $value;
            }
            return $sanatorio; //TODO: SOLUCIONAR ESTO 
            
        }
        
        public function actualizar(){
            $data = $this->model->updateUser(1, "Roberto", 23);
            print_r($data);
        }

        public function verusuarios(){
            $data = $this->model->getUsers();
            print_r($data);
        }

        public function eliminarusuario($id){
            $data = $this->model->deleteUser($id);
            print_r($data);
        }
    }