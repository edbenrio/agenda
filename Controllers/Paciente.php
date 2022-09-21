<?php
    class Paciente extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function paciente(){
            $paciente = $this->model->getpacientes();
            $this->views->getView($this, "paciente", $paciente);
        }

        public function insertar(){
            
            $error= false;
            $paciente = array();
            $ficha = array($_POST["txtenfermedadesbase"],  $_POST["txtalergia"], $_POST["txtobservaciones"]);

            empty($_POST["txtnombre"]) ? $error = true : array_push($paciente, $_POST["txtnombre"]);
            empty($_POST["txtapellido"]) ? $error = true : array_push($paciente, $_POST["txtapellido"]);
            empty($_POST["txtestado"]) ? $error = true : array_push($paciente, $_POST["txtestado"]);
            empty($_POST["txtcorreo"]) ? $error = true : array_push($paciente, $_POST["txtcorreo"]);
            empty($_POST["txtdireccion"]) ? $error = true : array_push($paciente, $_POST["txtdireccion"]);
            empty($_POST["txtciudad"]) ? $error = true : array_push($paciente, $_POST["txtciudad"]);
            empty($_POST["txtbarrio"]) ? $error = true : array_push($paciente, $_POST["txtbarrio"]);
            empty($_POST["txttelefono"]) ? $error = true : array_push($paciente, $_POST["txttelefono"]);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $paciente = $this->model->setPaciente($paciente);
                array_push($ficha, $paciente);
                $ficha = $this->model->nuevaFicha($ficha);
                echo $ficha;
            }
        }

        public function verpaciente($id){
            $data = $this->model->getPaciente($id);
            $data = json_encode($data[0]);
            echo ($data);
            
        }
        
        public function actualizar(){
            $error = false;
            
            empty($_POST["txtnombreEditar"]) ? $error = true : $paciente["txtnombreEditar"] = $_POST["txtnombreEditar"] ;
            empty($_POST["txtapellidoEditar"]) ? $error = true : $paciente["txtapellidoEditar"] = $_POST["txtapellidoEditar"] ;
            empty($_POST["txtestadoEditar"]) ? $error = true : $paciente["txtestadoEditar"] = $_POST["txtestadoEditar"] ;
            empty($_POST["txtcorreoEditar"]) ? $error = true : $paciente["txtcorreoEditar"] = $_POST["txtcorreoEditar"] ;
            empty($_POST["txtdireccionEditar"]) ? $error = true : $paciente["txtdireccionEditar"] = $_POST["txtdireccionEditar"] ;
            empty($_POST["txtciudadEditar"]) ? $error = true : $paciente["txtciudadEditar"] = $_POST["txtciudadEditar"] ;
            empty($_POST["txtbarrioEditar"]) ? $error = true : $paciente["txtbarrioEditar"] = $_POST["txtbarrioEditar"] ;
            empty($_POST["txttelefonoEditar"]) ? $error = true : $paciente["txttelefonoEditar"] = $_POST["txttelefonoEditar"] ;

            $id = 0;
            empty($_POST["hiddenIdEditar"]) ? $id = 0 : $id = $_POST["hiddenIdEditar"];

            if ($id == 0) echo "Error en el id al editar ";

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $data = $this->model->updatePaciente($paciente, $id);
                echo $data;
            }
        }

        public function verpacientes(){
            $data = $this->model->getPacientes();
            print_r($data);
        }

        public function eliminar($id){
            $data = $this->model->deletePaciente($id);
            echo ($data);
        }
    }