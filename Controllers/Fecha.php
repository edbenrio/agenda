<?php
    class Fecha extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function fecha(){
            $data["page_id"] = 2;
            $data["page_tag"] = "Roles Usuario";
            $data["page_title"] = "Roles Usuario <small>Tienda Virtual</small>";
            $data["page_name"] = "rol_usuario";
            $this->views->getView($this, "fecha", $data);
        }
        public function insertar(){
            
            $error= false;

            empty($_POST["txtfecha"]) ? $error = true : $fecha["txtfecha"] = $_POST["txtfecha"] ;

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setFecha($fecha);
                echo $resultado;
            }
        }                
    }