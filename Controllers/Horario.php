<?php
    class Horario extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function horario(){
            $horarios = $this->model->getHorarios();
            $this->views->getView($this, "horario", $horarios);
        }
        public function insertar(){
            
            $error= false;
            $horario = array();

            empty($_POST["txtdesde"]) ? $error = true : array_push($horario, $_POST["txtdesde"]);
            empty($_POST["txthasta"]) ? $error = true : array_push($horario, $_POST["txthasta"]);

            array_push($horario, "1"); //TODO: VER ESTA PARTE COMO HACER PARA PASAR EL ID DE LA FECHA 

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setHorario($horario);
                echo $resultado;
            }
        }                
    }