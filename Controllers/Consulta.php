<?php
    class Consulta extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function consulta(){
            $data = $this->model->getConsultas();
            $this->views->getView($this, "Consulta", $data);
        }

        public function insertar(){
            
            $error= false;
            $consulta = array();
            $id_sanatorio = $_SESSION["id_sanatorio"];
            $fecha = "";

            empty($_POST["txtduracion"]) ? $error = true : array_push($consulta, $_POST["txtduracion"]);
            empty($_POST["hiddenfechaConsultaNueva"]) ? $error = true : $fecha = $_POST["hiddenfechaConsultaNueva"];

            if(empty($_POST["hiddenIdPacienteConsultaNueva"])){
                if (empty($_POST["txtpacienteci"])){
                    $error = true;
                }else{
                    $id_paciente = $this->model->getPacienteIdByCi($_POST["txtpacienteci"]);
                    if (!$id_paciente){
                        $error = true;
                        echo 'Este paciente no existe, regístrelo </br>';
                    }
                }
            }else{
                $id_paciente = $_POST["hiddenIdPacienteConsultaNueva"];
            }
            
            $id_horario = $this->model->getHorarioIdByFecha($fecha, $id_sanatorio);
            $id_profesional = $this->model->ultimoIdProfesional();

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                array_push($consulta, 'En espera', $id_profesional, $id_paciente, $id_horario, $id_sanatorio );
                $resultado = $this->model->setConsulta($consulta);
                echo $resultado;
            }
        }

        public function actualizarestado($id_consulta){
            $estado = array();
            $error = false;
            empty($_POST["selectEstadoConsulta"]) ? $error = true : array_push($estado,  $_POST["selectEstadoConsulta"]);
            
            if($error){
                echo 'Hay un error con los ID';
            }else{
                $resultado = $this->model->setEstado($id_consulta, $estado);
                echo $resultado;
            }
        }

        public function detalleconsulta($id){
            $data = $this->model->getConsulta($id);

            $tratamientos = $this->model->getTratamientos($id);
            $data->tratamientos = $tratamientos;

            $analisis = $this->model->getAnalisis($id);
            $data->analisis = $analisis;

            $recetas = $this->model->getRecetas($id);
            $data->recetas = $recetas;

            $diagnosticos = $this->model->getDiagnosticos($id);
            $data->diagnosticos = $diagnosticos;

            $this->views->getView($this, "detalleconsulta", $data);
        }
    }