<?php
    class Fecha extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function fecha(){
            $data["page_id"] = 2;
            $data["page_tag"] = "Roles Usuario";
            $data["page_title"] = "Roles Usuario <small>Tienda Virtual</small>";
            $data["page_name"] = "rol_usuario";
            $this->views->getView($this, "fecha", $data);
        }

        public function insertar(){
            
            $error= false;
            $fecha = array();
            $id_sanatorio = $_SESSION["id_sanatorio"];

            empty($_POST["hiddenIdFechaNueva"]) ? $error = true : array_push($fecha, $_POST["hiddenIdFechaNueva"]);
            array_push($fecha, $id_sanatorio);

            if ($error){
                echo "Se deben completar todos los campos";
            }else{
                $resultado = $this->model->setFecha($fecha);
                echo $resultado;
            }
        }              
        
        public function verfechas(){
            $id_sanatorio = $_SESSION["id_sanatorio"];
            $fechas = $this->model->getFechas($id_sanatorio);
            $fechayhora = $this->model->getFechaHora($id_sanatorio);
            $fechaEvent = array();
            foreach ($fechayhora as $fh){
                $tmpObj = new stdClass();
                $datetime = new DateTime($fh["fecha"]." ".$fh["desde"]);
                $tmpObj->start = $datetime->format(DateTime::ATOM);
                $datetime = new DateTime($fh["fecha"]." ".$fh["hasta"]);
                $tmpObj->end = $datetime->format(DateTime::ATOM);
                //$tmpObj->display = "background";
                $tmpObj->backgroundColor = "rgba(0,155,80, 0.5)";
                array_push($fechaEvent, $tmpObj);
                $consultas = $this->model->getConsultas($fh["id_horario"]);
                if($consultas){
                    $objConsulta = new stdClass();
                    
                    foreach ($consultas as $key=>$consulta){
                        if ($key == 0){
                            $datetime = new DateTime($fh["fecha"]." ".$fh["desde"]);
                            $objConsulta->start = $datetime->format(DateTime::ATOM);
                            $res = $this->sum_the_time( $fh["desde"], $consulta["duracion"]);
                            $res = new DateTime($fh["fecha"]." ".$res);
                            $objConsulta->end = $res->format(DateTime::ATOM);
                            $objConsulta->title = $consulta["nombre"].' '.$consulta["apellido"];
                            $objConsulta->backgroundColor = "rgba(0,73,253, 0.5)";
                            array_push($fechaEvent, $objConsulta);
                        }else{
                            $tmpStart = $objConsulta->end;
                            $objConsulta = new stdClass();
                            $date = new DateTime($tmpStart);
                            $res = $this->sum_the_time($date->format('H:i:s'), $consulta["duracion"]);
                            $res = new DateTime($fh["fecha"]." ".$res);
                            $objConsulta->start = $tmpStart;
                            $objConsulta->end = $res->format(DateTime::ATOM);
                            $objConsulta->title = $consulta["nombre"].' '.$consulta["apellido"];
                            $objConsulta->backgroundColor = "rgba(0,73,253, 0.5)";
                            array_push($fechaEvent, $objConsulta);  
                        }
                    }
                }
            }
            
            $hoy = date("Y-m-d");
            foreach ($fechas as $fecha){
                $evento = new stdClass();
                $evento->color = "#38761d";
                if($fecha["fecha"] < $hoy) $evento->color = "#cc0000";
                $evento->allDay = true;
                $evento->start = $fecha["fecha"];
                $evento->display = "background";
                array_push($fechaEvent, $evento);
            }
            print_r(json_encode($fechaEvent));
        }

        function sum_the_time($time1, $time2) {
            $times = array($time1, $time2);
            $seconds = 0;
            foreach ($times as $time)
            {
              list($hour,$minute,$second) = explode(':', $time);
              $seconds += $hour*3600;
              $seconds += $minute*60;
              $seconds += $second;
            }
            $hours = floor($seconds/3600);
            $seconds -= $hours*3600;
            $minutes  = floor($seconds/60);
            $seconds -= $minutes*60;
            if($seconds < 9)
            {
            $seconds = "0".$seconds;
            }
            if($minutes < 9)
            {
            $minutes = "0".$minutes;
            }
              if($hours < 9)
            {
            $hours = "0".$hours;
            }
            return "{$hours}:{$minutes}:{$seconds}";
          }
    }
    