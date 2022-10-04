<?php
    class LoginModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function getExtistsProfesional(){
            $sql = 'SELECT COUNT(*) AS count FROM profesional';
            $result = $this->getExists($sql);
            return $result;
        }
        
        public function getUser(string $nombre){
            $query = "SELECT * FROM usuario WHERE nombre ='".$nombre."'";
            $result = $this->getOne($query);
            return $result;
        }

        public function datosDeSession(){
            session_start();
            $query = "SELECT p.nombre, p.apellido, u.rol, u.nombre AS usuario FROM usuario AS u JOIN profesional AS p ON p.id_usuario = u.id WHERE u.id = ". $_SESSION["id_user"];
            $result = $this->getOne($query);
            if(!$result){
                $query = "SELECT s.nombre, s.apellido, u.rol, u.nombre AS usuario FROM usuario AS u JOIN secretaria AS s ON s.id_usuario = u.id WHERE u.id = ". $_SESSION["id_user"];
                $result = $this->getOne($query);
            }
            return $result;
        }
    }