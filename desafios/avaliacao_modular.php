<?php

function calcularMedia($nota1, $nota2){
    return ($nota1 + $nota2) / 2;
}

function verificarSituacao($media, $frequencia){
    return (($media >= 6 && $frequencia >= 75) ? "Aprovado!" : "Reprovado!");
}

function exibirResumo($nome, $nota1, $nota2, $frequencia){
    $media = calcularMedia($nota1, $nota2);
    $situacao = verificarSituacao($media, $frequencia);

    echo "<h2>Aluno: $nome</h2>";
    echo "<p>Nota 1: $nota1<br>";
    echo "Nota 2: $nota2<br>";
    echo "Frequencia: $frequencia%<br>";
    echo "Situação: $situacao</p>";
}


exibirResumo("Jhonata", 7.5, 6, 82);