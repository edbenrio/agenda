<?php
    class HomeModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setUser(string $nombre, int $edad){
            $query_insert = "INSERT INTO usuario(nombre, edad) VALUES(?,?)";
            $arrData = array($nombre, $edad);
            $request_insert = $this->insert($query_insert, $arrData);
            return $request_insert;
        }

        public function getUser(string $id){
            $query = "SELECT * FROM usuario WHERE id =".$id;
            $result = $this->select($query);
            return $result;
        }

        public function updateUser(int $id, string $nombre, int $edad){   
            $sql = "UPDATE usuario SET nombre= ?, edad= ? WHERE id=". $id;
            $arrData = array($nombre, $edad);
            $result = $this->update($sql, $arrData);
            return $result;
        }

        public function getUsers(){
            $sql = "SELECT * FROM usuario";
            $result = $this->select_all($sql);
            return $result;
        }

        public function deleteUser($id){
            $sql = "DELETE FROM usuario WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

    }