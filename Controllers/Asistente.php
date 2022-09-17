<?php
    class Asistente extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function asistente(){    
            $asistente = $this->model->getasistentes();
            $this->views->getView($this, "asistente", $asistente);

        }

        public function insertar(){
            
            $error= false;
            $asistente = array();

            empty($_POST["txtnombre"]) ? $error = true : array_push($asistente, $_POST["txtnombre"]);
            empty($_POST["txtapellido"]) ? $error = true : array_push($asistente, $_POST["txtapellido"]);
            empty($_POST["txtestado"]) ? $error = true : array_push($asistente, $_POST["txtestado"]);
           
            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setAsistente($asistente);
                echo $resultado;
            }
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }
    }