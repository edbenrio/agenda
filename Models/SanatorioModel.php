<?php
    class SanatorioModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setSanatorio(array $sanatorio){
            $agendaId = $this->ultimoIdAgenda();
            $query_insert = "INSERT INTO sanatorio(nombre, mail, direccion, ciudad, barrio, telefono, celular, id_agenda) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array( $sanatorio["txtnombre"], $sanatorio["txtcorreo"], $sanatorio["txtdireccion"], 
                                $sanatorio["txtciudad"], $sanatorio["txtbarrio"], $sanatorio["txttelefono"], $sanatorio["txtcelular"], $agendaId);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }

        public function getSanatorio(string $id){
            $query = "SELECT * FROM sanatorio WHERE id =".$id." LIMIT 1" ;
            $result = $this->select($query);
            print_r($result) ;
        }

        public function updateSanatorio(int $id, string $nombre, int $edad){   
            $sql = "UPDATE sanatorio SET nombre= ?, edad= ? WHERE id=". $id;
            $arrData = array($nombre, $edad);
            $result = $this->update($sql, $arrData);
            return $result;
        }

        public function getSanatorios(){
            $sql = "SELECT * FROM sanatorio";
            $result = $this->select_all($sql);
            return $result;
        }

        public function deleteSanatorio($id){
            $sql = "DELETE FROM sanatorio WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->eliminar($sql);
            return $result;
        }

    }