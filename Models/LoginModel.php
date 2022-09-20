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
    }