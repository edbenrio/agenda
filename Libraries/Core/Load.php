<?php

    $controller = ucfirst($controller);
    //si la ruta es registrar o login no entra aca para 
    //no crear un bucle infinito
    if ($controller != "Registrar" && $controller != "Login" && $controller != "Session"){ 
        require_once('Controllers/Session.php');
        $session = new Session();
        $session->checkUser();
    }

    $controllerFile = "Controllers/".$controller.".php";
    if(file_exists($controllerFile)){
        require_once($controllerFile);
        $controller = new $controller();
        if(method_exists($controller, $method)){
            $controller->{$method}($params);
        }else{
            require_once("Controllers/Error.php");
        }
    }else{
        require_once("Controllers/Error.php");
    }