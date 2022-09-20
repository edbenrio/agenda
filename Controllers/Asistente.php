<?php
    class Asistente extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function asistente(){    
            $asistente = $this->model->getasistentes();
            $this->views->getView($this, "asistente", $asistente);

        }

        public function insertar(){
            
            $error= false;
            $asistente = array();
            $usuario = array();

            empty($_POST["txtnombre"]) ? $error = true : array_push($asistente, $_POST["txtnombre"]);
            empty($_POST["txtapellido"]) ? $error = true : array_push($asistente, $_POST["txtapellido"]);
            empty($_POST["txtestado"]) ? $error = true : array_push($asistente, $_POST["txtestado"]);

            empty($_POST["txtusuario"]) ? $error = true : array_push($usuario, strClean($_POST["txtusuario"]));
            empty($_POST["txtcontrasena"]) ? $error = true : array_push($usuario, strClean($_POST["txtcontrasena"]));

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $existeUsuario = $this->model->getExtistsUser($usuario[0]);
                if ($existeUsuario == 0){
                    array_push($usuario, "asistente");
                    $resultado = $this->model->crearUsuario($usuario);
                    if ($resultado != 0){
                        array_push($asistente, $resultado);
                        $resultado = $this->model->setAsistente($asistente);
                        echo true;
                    }else{
                        echo $resultado;
                    }
                }else{
                    echo 'El nombre de Usuario ya existe';
                }  
            }
        }

        public function verasistente($id){
            $data = $this->model->getAsistente($id);
            $data = json_encode($data[0]);
            echo ($data);
        }

        public function actualizar(){
            $error = false;
            $asistente = array();

            empty($_POST["txtnombreEditar"]) ? $error = true : array_push($asistente, $_POST["txtnombreEditar"]);
            empty($_POST["txtapellidoEditar"]) ? $error = true : array_push($asistente, $_POST["txtapellidoEditar"]);
            empty($_POST["txtestadoEditar"]) ? $error = true : array_push($asistente, $_POST["txtestadoEditar"]);

            $id = 0;
            empty($_POST["hiddenIdEditar"]) ? $id = 0 : $id = $_POST["hiddenIdEditar"];

            if ($id == 0) echo "Error en el id al editar ";

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $data = $this->model->updateAsistente($asistente, $id);
                echo $data;
            }
        }

        public function eliminar($id){
            $data = $this->model->deleteAsistente($id);
            echo ($data);
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }

        public function ultimoIdProfesional(){
            $sql = "SELECT id FROM profesional ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }
    }