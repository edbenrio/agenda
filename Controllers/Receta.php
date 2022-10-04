<?php
    class Receta extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function receta(){
            $recetas = $this->model->getRecetas();
            print_r($recetas);
        }

        public function insertar(){
            $error= false;
            $receta = array();

            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($receta, $_POST["txtConsultaDescripcion"]);
            empty($_POST["hiddenConsultaOpcionesConsultaId"]) ? $error = true : array_push($receta, intval($_POST["hiddenConsultaOpcionesConsultaId"]));
            
            $id_profesional = $this->model->getProfesioalId();
            array_push($receta, $id_profesional);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $receta = $this->model->setReceta($receta);
                echo $receta;
            }

            if(!empty($_POST["txtdescripcion"])){
                $receta = array();
            }
        }

        public function verreceta($id){
            $id = strClean($id);
            $data = $this->model->getReceta($id);
            $data = json_encode($data[0]);
            echo ($data);
        }

        public function actualizar(){
            $error = false;
            $receta = array();
            
            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($receta, $_POST["txtConsultaDescripcion"]);
            //empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $error = true : array_push($receta, intval($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]));

            $id = 0;
            empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $id = 0 : $id = $_POST["hiddenConsultaOpcionesConsultaDescripcionId"];

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $receta = $this->model->updateReceta($receta, $id);
                echo $receta;
            }
        }

        public function verrecetas(){
            $data = $this->model->getRecetas();
            print_r($data);
        }

        public function eliminar($id){
            $data = $this->model->deleteReceta($id);
            echo ($data);
        }
    }