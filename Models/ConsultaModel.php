<?php
    class ConsultaModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function getConsultas(){
            //$sql = "SELECT * FROM vista_consultas";  //TODO: SE CAMBIA LA VISTA POR CONSULTA PORQUE EL SERVER NO ACEPTA VISTAS
            $sql = "SELECT c.id as id_consulta, p.nombre, p.apellido, c.estado, f.fecha, h.desde, s.nombre as sanatorio FROM consulta AS c
                        JOIN pacientes as p 
                            ON c.id_paciente = p.id 
                        JOIN sanatorio AS s 
                            ON s.id = c.id_sanatorio 
                        JOIN horario AS h 
                            ON h.id = c.id_horario 
                        JOIN fecha AS f 
                            ON f.id = h.id_fecha";
                            
            $result = $this->select_all($sql);
            return $result;
        }

        public function getConsulta($id){
            $query = 
            "SELECT c.id AS id_consulta, c.estado, p.nombre AS nombre_paciente, p.apellido AS apellido_paciente, s.nombre AS nombre_sanatorio, h.desde AS hora, f.fecha FROM consulta as c 
            JOIN pacientes as p 
                ON p.id = c.id_paciente
            JOIN horario AS h 
                ON h.id = c.id_horario
            JOIN fecha as f 
                ON f.id = h.id_fecha
            JOIN sanatorio AS s 
                ON s.id = c.id_sanatorio
            WHERE c.id = ".$id;
            $result = $this->getOne($query);
            return $result ;
        }
        
        public function getTratamientos($id){
            $sql = "SELECT t.id, t.descripcion FROM tratamiento AS t WHERE t.id_consulta = ".$id;
            $result = $this->select_all($sql);
            return $result;
        }

        public function getRecetas($id){
            $sql = "SELECT r.id, r.descripcion FROM receta AS r WHERE r.id_consulta = ".$id;
            $result = $this->select_all($sql);
            return $result;
        }

        public function getDiagnosticos($id){
            $sql = "SELECT d.id, d.descripcion FROM diagnostico AS d WHERE d.id_consulta = ".$id;
            $result = $this->select_all($sql);
            return $result;
        }

        public function getAnalisis($id){
            $sql = "SELECT a.id, a.descripcion FROM analisis AS a WHERE a.id_consulta = ".$id;
            $result = $this->select_all($sql);
            return $result;
        }

        public function setConsulta(array $consulta){ 
            $query_insert = "INSERT INTO consulta(duracion, estado, id_profesional, id_paciente, id_horario, id_sanatorio) VALUES(?,?,?,?,?,?)";
            $request_insert = $this->insert($query_insert, $consulta);
            return $request_insert;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->getExists($sql);
            return $result;
        }

        public function ultimoIdProfesional(){
            $sql = "SELECT id FROM profesional ORDER BY id DESC LIMIT 1";
            $result = $this->getExists($sql);
            return $result;
        }

        public function getPacienteIdByCi($ci){
            $sql = "SELECT id FROM pacientes WHERE ci = '".$ci."' ORDER BY id DESC LIMIT 1";
            $result = $this->getExists($sql);
            return $result;
        }

        public function getHorarioIdByFecha($fecha, $id_sanatorio){
            $query = "SELECT h.id FROM fecha as f JOIN horario as h ON f.id = h.id_fecha WHERE id_sanatorio = '".$id_sanatorio."' AND f.fecha = '".$fecha."'";
            $result = $this->getExists($query);
            return $result;
        }

        public function setEstado(int $id, array $estado){
            $sql = "UPDATE consulta SET estado = ? WHERE id =". $id;
            $result = $this->update($sql, $estado);
            return $result;
        }

        public function setTratamiento(array $tratamiento){
            $query_insert = "INSERT INTO `tratamiento`(`descripcion`, `id_consulta`, `id_profesional`) VALUES(?,?,?)";
            $request_insert = $this->insert($query_insert, $tratamiento);
            return $request_insert;
        }

    }