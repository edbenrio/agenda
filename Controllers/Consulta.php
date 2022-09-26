<?php
    class Consulta extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function consulta(){
            $data["page_id"] = 2;
            $data["page_tag"] = "Roles Usuario";
            $data["page_title"] = "Roles Usuario <small>Tienda Virtual</small>";
            $data["page_name"] = "rol_usuario";
            $this->views->getView($this, "consulta", $data);
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
    }