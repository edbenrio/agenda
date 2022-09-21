<?php
    class FechaModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setFecha(array $fecha){ //DECIA SETPACIENTE
            $query_insert = "INSERT INTO fecha(fecha,id_agenda) VALUES(?,?)";
            $arrData = array($fecha["txtfecha"] , $this->ultimoIdAgenda());
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

    }