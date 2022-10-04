<?php
    class Analisis extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function analisis(){
            $analisiss = $this->model->getAllAnalisis();
            print_r($analisiss);
            //$this->views->getView($this, "analisis", $analisis);
        }

        public function insertar(){
            $error= false;
            $analisis = array();

            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($analisis, $_POST["txtConsultaDescripcion"]);
            empty($_POST["hiddenConsultaOpcionesConsultaId"]) ? $error = true : array_push($analisis, intval($_POST["hiddenConsultaOpcionesConsultaId"]));
            
            $id_profesional = $this->model->getProfesioalId();
            array_push($analisis, $id_profesional);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $analisis = $this->model->setAnalisis($analisis);
                echo $analisis;
            }

            if(!empty($_POST["txtdescripcion"])){
                $analisis = array();
            }
        }

        public function veranalisis($id){
            $id = strClean($id);
            $data = $this->model->getAnalisis($id);
            $data = json_encode($data[0]);
            echo ($data);
        }

        public function actualizar(){
            $error = false;
            $analisis = array();
            
            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($analisis, $_POST["txtConsultaDescripcion"]);
            //empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $error = true : array_push($analisis, intval($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]));

            $id = 0;
            empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $id = 0 : $id = $_POST["hiddenConsultaOpcionesConsultaDescripcionId"];

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $analisis = $this->model->updateAnalisis($analisis, $id);
                echo $analisis;
            }
        }

        public function veranalisiss(){
            $data = $this->model->getAnalisiss();
            print_r($data);
        }

        public function eliminar($id){
            $data = $this->model->deleteAnalisis($id);
            echo ($data);
        }
    }