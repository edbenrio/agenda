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
            $fecha ="";

            empty($_POST["txtdesde"]) ? $error = true : array_push($horario, $_POST["txtdesde"]);
            empty($_POST["txthasta"]) ? $error = true : array_push($horario, $_POST["txthasta"]);

            empty($_POST["hiddenIdHorarioNuevo"]) ? $error = true : $fecha = $_POST["hiddenIdHorarioNuevo"];

            
            if ($error){
                echo "Se deben completar todos los campos";
            }else{

                $fechaId = $this->model->getFechaId($fecha);
                array_push($horario, $fechaId); 
                
                $resultado = $this->model->setHorario($horario);
                echo $resultado;
            }
        }                
    }