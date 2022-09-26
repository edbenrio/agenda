<?php
    class ConsultaModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function getConsultas(){
            $sql = "SELECT * FROM vista_consultas";
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

    }