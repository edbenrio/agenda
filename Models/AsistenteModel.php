<?php
    class AsistenteModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setAsistente(array $asistente){
            $query_insert = "INSERT INTO secretaria (nombre, apellido, email, direccion, ciudad, barrio, telefono, estado) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array( $asistente["txtnombre"],$asistente["txtapellido"] , $asistente["txtcorreo"], $asistente["txtdireccion"], 
                                $asistente["txtciudad"], $asistente["txtbarrio"], $asistente["txttelefono"], $asistente["txtestado"]);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }

        public function getAsistente(string $id){
            $query = "SELECT * FROM secretaria WHERE id =".$id." LIMIT 1" ;
            $result = $this->select($query);
            return $result ;
        }

        public function updateAsistente(array $asistente, int $id){   
            $sql = "UPDATE secretaria SET nombre = ?, apellido = ?, email = ? ,direccion = ?, ciudad = ?, barrio = ?, telefono = ?, estado = ? WHERE id =". $id;
        
            $arrData = array( $asistente["txtnombreEditar"],$asistente["txtapellidoEditar"] , $asistente["txtcorreoEditar"], $asistente["txtdireccionEditar"], 
                $asistente["txtciudadEditar"], $asistente["txtbarrioEditar"], $asistente["txttelefonoEditar"], $asistente["txtestadoEditar"]);
            $result = $this->update($sql, $arrData);
            return $result;
        }

        public function getAsistentes(){
            $sql = "SELECT * FROM secretaria";
            $result = $this->select_all($sql);
            return $result;
        }

        public function deleteAsistente($id){
            $sql = "DELETE FROM secretaria WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

    }