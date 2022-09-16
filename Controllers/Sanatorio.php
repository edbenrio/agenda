<?php
    class Sanatorio extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function sanatorio(){
            $sanatorio = $this->model->getSanatorios();
            $this->views->getView($this, "sanatorio", $sanatorio);
        }

        public function insertar(){
            
            $error= false;

            empty($_POST["txtnombre"]) ? $error = true : $sanatorio["txtnombre"] = $_POST["txtnombre"] ;
            empty($_POST["txtcorreo"]) ? $error = true : $sanatorio["txtcorreo"] = $_POST["txtcorreo"] ;
            empty($_POST["txtdireccion"]) ? $error = true : $sanatorio["txtdireccion"] = $_POST["txtdireccion"] ;
            empty($_POST["txtciudad"]) ? $error = true : $sanatorio["txtciudad"] = $_POST["txtciudad"] ;
            empty($_POST["txtbarrio"]) ? $error = true : $sanatorio["txtbarrio"] = $_POST["txtbarrio"] ;
            empty($_POST["txttelefono"]) ? $error = true : $sanatorio["txttelefono"] = $_POST["txttelefono"] ;
            empty($_POST["txtcelular"]) ? $error = true : $sanatorio["txtcelular"] = $_POST["txtcelular"] ;

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setSanatorio($sanatorio);
                echo $resultado;
            }
        }

        public function versanatorio($id){
            $data = $this->model->getSanatorio($id);
            $data = json_encode($data[0]);
            echo ($data);
            
        }
        
        public function actualizar(){
            $error = false;
            
            empty($_POST["txtnombreEditar"]) ? $error = true : $sanatorio["txtnombreEditar"] = $_POST["txtnombreEditar"] ;
            empty($_POST["txtcorreoEditar"]) ? $error = true : $sanatorio["txtcorreoEditar"] = $_POST["txtcorreoEditar"] ;
            empty($_POST["txtdireccionEditar"]) ? $error = true : $sanatorio["txtdireccionEditar"] = $_POST["txtdireccionEditar"] ;
            empty($_POST["txtciudadEditar"]) ? $error = true : $sanatorio["txtciudadEditar"] = $_POST["txtciudadEditar"] ;
            empty($_POST["txtbarrioEditar"]) ? $error = true : $sanatorio["txtbarrioEditar"] = $_POST["txtbarrioEditar"] ;
            empty($_POST["txttelefonoEditar"]) ? $error = true : $sanatorio["txttelefonoEditar"] = $_POST["txttelefonoEditar"] ;
            empty($_POST["txtcelularEditar"]) ? $error = true : $sanatorio["txtcelularEditar"] = $_POST["txtcelularEditar"] ;

            $id = 0;
            empty($_POST["hiddenIdEditar"]) ? $id = 0 : $id = $_POST["hiddenIdEditar"];

            if ($id == 0) echo "Error en el id al editar";

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $data = $this->model->updateSanatorio($sanatorio, $id);
                echo $data;
            }
        }

        public function versanatorios(){
            $data = $this->model->getSanatorios();
            print_r($data);
        }

        public function eliminar($id){
            $data = $this->model->deleteSanatorio($id);
            echo ($data);
        }
    }