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

            empty($_POST["txtnombre"]) ? $error = true : $paciente["txtnombre"] = $_POST["txtnombre"] ;
            empty($_POST["txtapellido"]) ? $error = true : $paciente["txtapellido"] = $_POST["txtapellido"] ;
            empty($_POST["txtestado"]) ? $error = true : $paciente["txtestado"] = $_POST["txtestado"] ;
            empty($_POST["txtcorreo"]) ? $error = true : $paciente["txtcorreo"] = $_POST["txtcorreo"] ;
            empty($_POST["txtdireccion"]) ? $error = true : $paciente["txtdireccion"] = $_POST["txtdireccion"] ;
            empty($_POST["txtciudad"]) ? $error = true : $paciente["txtciudad"] = $_POST["txtciudad"] ;
            empty($_POST["txtbarrio"]) ? $error = true : $paciente["txtbarrio"] = $_POST["txtbarrio"] ;
            empty($_POST["txttelefono"]) ? $error = true : $paciente["txttelefono"] = $_POST["txttelefono"] ;

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setPaciente($paciente);
                echo $resultado;
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