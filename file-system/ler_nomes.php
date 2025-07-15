<?php 

// https://www.php.net/manual/pt_BR/book.filesystem.php

$arquivo = fopen("nomes.txt", "r");

while($nome =fgets($arquivo)){

    echo "$nome";
    echo "<br>";
}

fclose($arquivo);
?>