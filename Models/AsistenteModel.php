<?php
    class AsistenteModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }

        public function setAsistente(array $asistente){
            $agendaId = $this->ultimoIdAgenda();
            $profesionalId = $this->ultimoIdProfesional();
            $query_insert = "INSERT INTO secretaria (nombre, apellido, estado, id_usuario, id_agenda, id_profesional) VALUES(?,?,?,?,?,?)";
            array_push($asistente, $agendaId, $profesionalId);
            $request_insert = $this->insert($query_insert, $asistente);
            return $request_insert;
        }

        public function getAsistente(string $id){
            $query = "SELECT * FROM secretaria WHERE id =".$id." LIMIT 1" ;
            $result = $this->select($query);
            return $result ;
        }

        public function updateAsistente(array $asistente, int $id){   
            $sql = "UPDATE secretaria SET nombre = ?, apellido = ?, estado = ? WHERE id =". $id;
            $result = $this->update($sql, $asistente);
            return $result;
        }

        public function getAsistentes(){
            $sql = "SELECT * FROM secretaria";
            $result = $this->select_all($sql);
            return $result;
        }

        public function deleteAsistente($id){
            $sql = "DELETE FROM secretaria WHERE id = $id";
            $result = $this->eliminar($sql);
            return $result;
        }

        public function ultimoIdAgenda(){
            $sql = "SELECT id FROM agenda ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }

        public function ultimoIdProfesional(){
            $sql = "SELECT id FROM profesional ORDER BY id DESC LIMIT 1";
            $result = $this->getLast($sql);
            return $result;
        }

        public function crearUsuario(array $usuario){
            $query_insert = "INSERT INTO usuario(nombre, contrasena, rol) VALUES(?,?,?)";
            $request_insert = $this->insert($query_insert, $usuario);
            return $request_insert;
        }

        public function getExtistsUser(string $nombre){
            $sql = "SELECT COUNT(*) AS count FROM usuario WHERE nombre ='".$nombre."'";
            $result = $this->getExists($sql);
            return $result;
        }
    }