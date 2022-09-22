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
            $fecha = array();

            empty($_POST["hiddenIdFechaNueva"]) ? $error = true : array_push($fecha, $_POST["hiddenIdFechaNueva"]);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setFecha($fecha);
                echo $resultado;
            }
        }              
        
        public function verfechas(){
            $fechas = $this->model->getFechas();
            $fechaEvent = array();
            $hoy = date("Y-m-d");
            foreach ($fechas as $fecha){
                $evento = new stdClass();
                $evento->color = "#38761d";
                if($fecha["fecha"] < $hoy) $evento->color = "#cc0000";
                $evento->start = $fecha["fecha"];
                $evento->end = $fecha["fecha"];
                $evento->display = "background";
                array_push($fechaEvent, $evento);
            }
            print_r(json_encode($fechaEvent));
        }
    }
    