<?php

    class Conexion{
        private $conect;

        public function __construct(){
            $conectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try {
                $this->conect = new PDO($conectionString, DB_USER, DB_PASSWORD);
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e){
                $this->conect = 'Error de conexión';
                echo "ERROR: ". $e->getMessage();
            }
        }

        public function getConnect(){
            return $this->conect;
        }
    }

    $conect = new Conexion();