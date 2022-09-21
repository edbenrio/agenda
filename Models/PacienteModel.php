<?php
    class PacienteModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setPaciente(array $paciente){
            $query_insert = "INSERT INTO pacientes(nombre, apellido, estado, email, direccion, ciudad, barrio, telefono) VALUES(?,?,?,?,?,?,?,?)";
            $request_insert = $this->insert($query_insert, $paciente);
            return $request_insert;
        }

        public function nuevaFicha(array $ficha){
            $query_insert = "INSERT INTO ficha(enfermedades_base, alergias, observaciones, id_paciente) VALUES(?,?,?,?)";
            $request_insert = $this->insert($query_insert, $ficha);
            return $request_insert;
        }

        public function getPaciente(string $id){
            //$query = "SELECT * FROM pacientes WHERE id =".$id." LIMIT 1" ;
            $query = "SELECT p.id, p.nombre, p.apellido, p.estado, p.direccion, p.ciudad, p.barrio, p.telefono, p.email, f.enfermedades_base, f.alergias, f.observaciones FROM pacientes as p JOIN ficha as f ON f.id_paciente = p.id WHERE p.id = ". $id;
            $result = $this->select($query);
            return $result ;
        }

        public function updatePaciente(array $paciente, int $id){   
            $sql = "UPDATE pacientes SET nombre = ?, apellido = ?, email = ? ,direccion = ?, ciudad = ?, barrio = ?, telefono = ?, estado = ? WHERE id =". $id;
        
            $arrData = array( $paciente["txtnombreEditar"],$paciente["txtapellidoEditar"] , $paciente["txtcorreoEditar"], $paciente["txtdireccionEditar"], 
                $paciente["txtciudadEditar"], $paciente["txtbarrioEditar"], $paciente["txttelefonoEditar"], $paciente["txtestadoEditar"]);
            $result = $this->update($sql, $arrData);
            return $result;
        }

        public function updateFicha(array $ficha, int $id_paciente){
            $sql = "UPDATE ficha SET enfermedades_base = ?, alergias = ?, observaciones = ? WHERE id_paciente =". $id_paciente;
            $result = $this->update($sql, $ficha);
            return $result;
        }

        public function getPacientes(){
            $sql = "SELECT * FROM pacientes";
            $result = $this->select_all($sql);
            return $result;
        }

        public function deletePaciente($id){
            $sql = "DELETE FROM pacientes WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

    }