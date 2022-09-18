<?php
    class RegistrarModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function crearUsuario(array $usuario){
            $query_insert = "INSERT INTO usuario(nombre, contrasena, rol) VALUES(?,?,?)";
            array_push($usuario, "doctor");
            $request_insert = $this->insert($query_insert, $usuario);
            return $request_insert;
        }

        public function crearProfesional(array $profesional){
            $query_insert = "INSERT INTO profesional(nombre, apellido, correo, telefono, estado, id_usuario) VALUES(?,?,?,?,?,?)";
            $request_insert = $this->insert($query_insert, $profesional);
            return $request_insert;
        }

        public function crearAgenda(int $profesional){
            $query_insert = "INSERT INTO agenda(id_profesional) VALUES(?)";
            $tempId = array();
            array_push($tempId, $profesional);
            $request_insert = $this->insert($query_insert, $tempId);
            return $request_insert;
        }
    }