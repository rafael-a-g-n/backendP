<?php
//simplifica o processo de inclusão de classes, assim não é necessário incluir em cada ficheiro sempre que tenha que usar uma nova classe
spl_autoload_register(function ($class) {
    if (file_exists("Libraries/" . 'Core/' . $class . ".php")) {
        require_once("Libraries/" . 'Core/' . $class . ".php");
    }
});
