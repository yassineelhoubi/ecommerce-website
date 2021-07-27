<?php
 
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: DELETE , POST , PUT , GET ');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');
 

 spl_autoload_register(function ($class) {
    $path = "model/" . $class . ".php";
    if (file_exists($path)) {
        require_once "$path";
    }
    else {
        $path = "config/" . $class . ".php";
        require_once "$path";
    }
});


$params = explode('/', $_GET['p']);

if (isset($params[0]) & !empty($params[0])) {

    $controller = ucfirst($params[0]);

    if (file_exists("controller/" . $controller . ".php")) {

        require_once 'controller/' . $controller . ".php";
        $obj = new $controller();
        if (isset($params[1]) & !empty($params[1])) {
            if (method_exists($obj, $params[1])) {
                $action = $params[1];

                if (isset($params[2]) & !empty($params[2])) {
                    $obj->$action($params[2]);
                } else {
                    $obj->$action();
                }
            } else {
                http_response_code(404);
                echo "this method doesn't exist";
            }
        } else {
            $action = "index";
            $obj->$action();
        }
    } else {
        http_response_code(404);
        echo "this page doesn't exsit";
    }
}

?>