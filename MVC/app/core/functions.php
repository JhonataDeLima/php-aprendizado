<?php

namespace App\Core;

function dd(...$vars){
    echo "<pre>";
    echo "<strong> Debug Output: </strong><br>";
    
    foreach ($vars as $var){
        echo '<pre style="background-color: #d1d1d1;
        color: #212529;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        font-family: monospace;">';
        \var_dump($var);
        echo "<br>";
        echo "</pre>";
    }

    $backtrace = debug_backtrace()[0];
    echo '<strong> Arquivo: </strong>' . $backtrace['file'] . '<br>';
    echo '<strong> Linha: </strong>' . $backtrace['line'] . '<br>';
    echo "</pre>";
    die();

}