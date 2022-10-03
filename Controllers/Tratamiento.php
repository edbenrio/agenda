<?php
    class Tratamiento extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function tratamiento(){
            $tratamientos = $this->model->getTratamientos();
            print_r($tratamientos);
            //$this->views->getView($this, "tratamiento", $tratamiento);
        }

        public function insertar(){
            $error= false;
            $tratamiento = array();

            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($tratamiento, $_POST["txtConsultaDescripcion"]);
            empty($_POST["hiddenConsultaOpcionesConsultaId"]) ? $error = true : array_push($tratamiento, intval($_POST["hiddenConsultaOpcionesConsultaId"]));
            
            $id_profesional = $this->model->getProfesioalId();
            array_push($tratamiento, $id_profesional);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $tratamiento = $this->model->setTratamiento($tratamiento);
                echo $tratamiento;
            }

            if(!empty($_POST["txtdescripcion"])){
                $tratamiento = array();
            }
        }

        public function vertratamiento($id){
            $id = strClean($id);
            $data = $this->model->getTratamiento($id);
            $data = json_encode($data[0]);
            echo ($data);
        }

        public function actualizar(){
            $error = false;
            $tratamiento = array();
            
            empty($_POST["txtConsultaDescripcion"]) ? $error = true : array_push($tratamiento, $_POST["txtConsultaDescripcion"]);
            //empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $error = true : array_push($tratamiento, intval($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]));

            $id = 0;
            empty($_POST["hiddenConsultaOpcionesConsultaDescripcionId"]) ? $id = 0 : $id = $_POST["hiddenConsultaOpcionesConsultaDescripcionId"];

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $tratamiento = $this->model->updateTratamiento($tratamiento, $id);
                echo $tratamiento;
            }
        }

        public function vertratamientos(){
            $data = $this->model->getTratamientos();
            print_r($data);
        }

        public function eliminar($id){
            $data = $this->model->deleteTratamiento($id);
            echo ($data);
        }
    }