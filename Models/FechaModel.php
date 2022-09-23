<?php
    class FechaModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setFecha(array $fecha){ 
            $query_insert = "INSERT INTO fecha(fecha,id_agenda) VALUES(?,?)";
            array_push($fecha, $this->ultimoIdAgenda());
            $request_insert = $this->insert($query_insert, $fecha);
            return $request_insert;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function getFechas(){
            $query = "SELECT * FROM fecha";
            $result = $this->select_all($query);
            return $result;
        }

        public function getFechaHora(){
            $query = "SELECT f.fecha, h.desde, h.hasta FROM fecha as f JOIN horario as h ON f.id = h.id_fecha";
            $result = $this->select_all($query);
            return $result;
        }
    }