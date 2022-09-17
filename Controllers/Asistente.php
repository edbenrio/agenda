<?php
    class Asistente extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function asistente(){
            /*$data["page_id"] = 2;
            $data["page_tag"] = "Agenda Médica";
            $data["page_title"] = "Agenda Médica";
            $data["page_name"] = "dashboard";*/
           // require("./Models/Dashboard.php");
           // $this->getSanatorios();
            
            $asistente = $this->model->getasistentes();
            $this->views->getView($this, "asistente", $asistente);

        }
    }