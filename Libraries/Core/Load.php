<?php

$controllerFile = "Controllers/" . $controller . ".php";
if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();
    if (method_exists($controller, $method)) {
        $controller->{$method}($params);
    } else {
        http_response_code(404);
        require_once("Controllers/Error.php");
    }
} else {
    http_response_code(404);
    require_once("Controllers/Error.php");
}
