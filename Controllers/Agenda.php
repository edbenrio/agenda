<?php
    class Agenda extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function agenda(){
            $data["page_id"] = 2;
            $data["page_tag"] = "Roles Usuario";
            $data["page_title"] = "Roles Usuario <small>Tienda Virtual</small>";
            $data["page_name"] = "rol_usuario";
            $this->views->getView($this, "agenda", $data);
        }
    }