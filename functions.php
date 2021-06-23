<?php

function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function view(string $name, $params=[])
{
    $filename = "views/{$name}.php";

    
    if ( file_exists($filename) ) {
        extract($params);
        require_once $filename;
    } else {
        require_once "views/errors/404";
    }
}

function redirect(string $name)
{
    header("Location: {$name}");
}

/**
 * Make a string of placeholders out of params
 * 
 * @param array $arr
 */
function makePlaceholders(array $arr)
{
    return implode( ', ', array_map(function(){ return '?'; }, $arr) );
}

function short_string($string, $num_simbols)
{
    return strlen($string) > $num_simbols ? substr($string, 0, $num_simbols) . '...' : $string;
}
