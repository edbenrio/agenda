<?php
    class Mysql extends Conexion{
        private $conexion;
        private $strquery;
        private $arrValues;

        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->getConnect();
        }

        //insertar un registro
        public function insert(string $query, array $arrValues){
            $this->strquery = $query;
            $this->arrValues = $arrValues;
            $insert = $this->conexion->prepare($this->strquery);;
            $resInsert = $insert->execute($this->arrValues);
            if($resInsert){
                $lastInsert = $this->conexion->lastInsertId();
            }else{
                $lastInsert = 0;
            }
            return $lastInsert;
        }

        //buscar registro
        public function select(string $query){
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        //buscar registro
        public function getOne(string $query){
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_OBJ);
            return $data;
        }

        //DEVOLVER SI EXISTE UN REGISTRO EN LA TABLE

        public function getExists(string $query){
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetchColumn();
            return $data;
        }

        //Devolver todos los registros 
        public function select_all(string $query){
            $this->strquery = $query;
            $result = $this->conexion->prepare($this->strquery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        //actualizar registros 
        public function update(string $query, array $arrValues){
            $this->strquery = $query;
            $this->arrValues = $arrValues;
            $update = $this->conexion->prepare($this->strquery);
            $result = $update->execute($this->arrValues);
            return $result;
        }

        //eliminar un registro 
        public function eliminar(string $query){
            $this->strquery = $query;
            $eliminar = $this->conexion->prepare($this->strquery);
            $result = $eliminar->execute();
            return $result;
        }

        //devolver el ultimo registro
        public function getLast(string $query){
            $this->strquery = $query;
            $ultimoId = $this->conexion->prepare($this->strquery);
            $result = $ultimoId->execute();
            return $result;
        }
    }