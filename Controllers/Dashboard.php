<?php
    class Dashboard extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function dashboard(){
            /*$data["page_id"] = 2;
            $data["page_tag"] = "Agenda Médica";
            $data["page_title"] = "Agenda Médica";
            $data["page_name"] = "dashboard";*/
           // require("./Models/Dashboard.php");
           // $this->getSanatorios();
            $sanatorio = $this->model->getSanatorios();
            $this->views->getView($this, "dashboard", $sanatorio);

        }
    }