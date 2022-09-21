<?php
    class HorarioModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function getHorarios(){
            $query = "SELECT * FROM horario";
            $result = $this->select_all($query);
            return $result;
        }

        public function setHorario(array $horario){ //DECIA SETPACIENTE
            $query_insert = "INSERT INTO horario(desde,hasta, id_fecha) VALUES(?,?,?)";
            $request_insert = $this->insert($query_insert, $horario);
            return $request_insert;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

    }