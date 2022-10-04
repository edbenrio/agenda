<?php
    class DiagnosticoModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setDiagnostico(array $diagnostico){
            $query_insert = "INSERT INTO `diagnostico`(`descripcion`, `id_consulta`, `id_profesional`) VALUES(?,?,?)";
            $request_insert = $this->insert($query_insert, $diagnostico);
            return $request_insert;
        }

        public function getDiagnostico(string $id){
            //$query = "SELECT * FROM diagnostico WHERE id =".$id." LIMIT 1" ;
            $query = "SELECT t.id, t.descripcion, t.id_paciente, t.id_profesional, t.id_consulta, p.nombre, p.apellido, p.ci, p.estado, p.direccion, p.ciudad, p.barrio, p.telefono, p.email, pr.nombre, pr.apellido, pr.estado, pr.correo, pr.telefono, pr.id_usuario, c.duracion, c.estado, c.id_profesional, c.id_paciente, c.id_horario, c.id_sanatorio
            FROM consulta AS c JOIN diagnostico AS t ON c.id=t.id_consulta JOIN profesional AS pr ON pr.id=t.id_profesional JOIN pacientes AS p ON p.id=t.id_paciente WHERE t.id = ". $id;
            $result = $this->select($query);
            return $result ;
        }

        //TESTEAR
        public function updateDiagnostico(array $diagnostico, int $id){  
            echo $id; 
            $sql = "UPDATE diagnostico SET descripcion = ? WHERE id =".intval($id);
            $result = $this->update($sql, $diagnostico);
            return $result;
        }

        public function getDiagnosticos(){
            $sql = "SELECT * FROM diagnostico";
           /* $sql = "SELECT t.id, t.descripcion, t.id_paciente, t.id_profesional, t.id_consulta, p.nombre, p.apellido, p.ci, p.estado, p.direccion, p.ciudad, p.barrio, p.telefono, p.email, pr.nombre, pr.apellido, pr.estado, pr.correo, pr.telefono, pr.id_usuario, c.duracion, c.estado, c.id_profesional, c.id_paciente, c.id_horario, c.id_sanatorio
            FROM consulta AS c JOIN diagnostico AS t ON c.id=t.id_consulta JOIN profesional AS pr ON pr.id=t.id_profesional JOIN pacientes AS p ON p.id=t.id_paciente";*/
            $result = $this->select_all($sql);
            return $result;
        }

        //TESTEAR
        public function deleteDiagnostico($id){
            $sql = "DELETE FROM diagnostico WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function getProfesioalId(){
            $sql = "SELECT id FROM profesional ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }
    }