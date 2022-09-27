<?php
    class TratamientoModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setTratamiento(array $tratamiento){
            $query_insert = "INSERT INTO `tratamiento`(`descripcion`, `id_paciente`, `id_profesional`, `id_consulta`) VALUES(?,?,?,?)";
            $request_insert = $this->insert($query_insert, $tratamiento);
            return $request_insert;
        }

        public function getTratamiento(string $id){
            //$query = "SELECT * FROM tratamiento WHERE id =".$id." LIMIT 1" ;
            $query = "SELECT t.id, t.descripcion, t.id_paciente, t.id_profesional, t.id_consulta, p.nombre, p.apellido, p.ci, p.estado, p.direccion, p.ciudad, p.barrio, p.telefono, p.email, pr.nombre, pr.apellido, pr.estado, pr.correo, pr.telefono, pr.id_usuario, c.duracion, c.estado, c.id_profesional, c.id_paciente, c.id_horario, c.id_sanatorio
            FROM consulta AS c JOIN tratamiento AS t ON c.id=t.id_consulta JOIN profesional AS pr ON pr.id=t.id_profesional JOIN pacientes AS p ON p.id=t.id_paciente WHERE t.id = ". $id;
            $result = $this->select($query);
            return $result ;
        }

        //TESTEAR
        public function updateTratamiento(array $tratamiento, int $id){  
            echo $id; 
            $sql = "UPDATE tratamiento SET descripcion = ?, id_paciente = ?, id_profesional = ? ,id_consulta = ? WHERE id =".intval($id);
            $arrData = array($tratamiento[0],$tratamiento[1] , $tratamiento[2], $tratamiento[3]);
            echo $sql;
            $result = $this->update($sql, $arrData);
            return $result;
        }

        public function getTratamientos(){
            $sql = "SELECT t.id, t.descripcion, t.id_paciente, t.id_profesional, t.id_consulta, p.nombre, p.apellido, p.ci, p.estado, p.direccion, p.ciudad, p.barrio, p.telefono, p.email, pr.nombre, pr.apellido, pr.estado, pr.correo, pr.telefono, pr.id_usuario, c.duracion, c.estado, c.id_profesional, c.id_paciente, c.id_horario, c.id_sanatorio
            FROM consulta AS c JOIN tratamiento AS t ON c.id=t.id_consulta JOIN profesional AS pr ON pr.id=t.id_profesional JOIN pacientes AS p ON p.id=t.id_paciente";
            $result = $this->select_all($sql);
            return $result;
        }

        //TESTEAR
        public function deleteTratamiento($id){
            $sql = "DELETE FROM tratamiento WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

    }