<?php
    class Tratamiento extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function tratamiento(){
            $tratamiento = $this->model->getTratamientos();
            $this->views->getView($this, "tratamiento", $tratamiento);
        }

        public function insertar(){
            $error= false;
            $tratamiento = array();

            empty($_POST["txtdescripcion"]) ? $error = true : array_push($tratamiento, $_POST["txtdescripcion"]);
            empty($_POST["txtid_paciente"]) ? $error = true : array_push($tratamiento, intval($_POST["txtid_paciente"]));
            empty($_POST["txtid_consulta"]) ? $error = true : array_push($tratamiento, intval($_POST["txtid_consulta"]));
            
            $id_profesional = $this->model->getProfesioalId();
            array_push($tratamiento, $id_profesional);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $tratamiento = $this->model->setTratamiento($tratamiento);
                echo $tratamiento;
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
            
            empty($_POST["txtdescripcion"]) ? $error = true : array_push($tratamiento, $_POST["txtdescripcion"]);
            empty($_POST["txtid_paciente"]) ? $error = true : array_push($tratamiento, intval($_POST["txtid_paciente"]));
            empty($_POST["txtid_profesional"]) ? $error = true : array_push($tratamiento, intval($_POST["txtid_profesional"]));
            empty($_POST["txtid_consulta"]) ? $error = true : array_push($tratamiento, intval($_POST["txtid_consulta"]));

            $id = 0;
            empty($_POST["hiddenIdEditar"]) ? $id = 0 : $id = $_POST["hiddenIdEditar"];

            if ($id == 0) echo "Error en el id al editar ";

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