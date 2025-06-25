<?php

$nomeAluno = "Jhonata";
$nota1 = 8;
$nota2 = 6;
$frequencia = 76;
$mediaMinima = 6;
$frequenciaMinima = 80;

$media = ($nota1 + $nota2)/2;

$situacaoAluno = (($media >= $mediaMinima && $frequencia >= $frequenciaMinima) ? "Aprovado!" : "Reprovado!");

echo "<h2> $nomeAluno </h2>";
echo "<p> 1° nota: $nota1 <br>";
echo "2° nota: $nota2 <br>";
echo "Frequencia: $frequencia"."% <br>";
echo "Resultado final: $situacaoAluno </p>";