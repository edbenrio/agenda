<?php
    class Agenda extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function agenda(){
            $this->views->getView($this, "agenda", null);
        }

        public function setSanatorioId($id){
            $_SESSION["id_sanatorio"] = $id;
        }
    }