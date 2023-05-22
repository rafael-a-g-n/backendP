<?php

//retorna url do projeto
function base_url()
{
    return BASE_URL;
}

//retorna a url dos Assets
function assets()
{
    return BASE_URL . "/Assets";
}

//mostrar informação formatada (depurar/debug)
function dep($data)
{
    $format  = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}
//sanitização e segurança (limpeza)
function strClean($str)
{
    return htmlspecialchars(strip_tags(trim($str)));
}

//Gerar uma password
function passwordGenerator($length = 10)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!"#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~';
    $charLength = strlen($chars);
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $charLength - 1)];
    }

    return $password;
}

//Gerar um token
function token($length = 32)
{
    $token = bin2hex(random_bytes($length));
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    return $hashedToken;
}

// formatação de valores monetários
function formatMoney($quantity)
{
    $quantity = number_format($quantity, 2, ",", " ");
    return $quantity;
}
