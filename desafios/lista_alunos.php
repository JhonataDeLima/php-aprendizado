<?php

$alunos = [
    ["nome" => "Jhonata", "nota1" => 7, "nota2" => 5, "frequencia" => 70],
    ["nome" => "Cynthia", "nota1" => 9, "nota2" => 8, "frequencia" => 80],
    ["nome" => "Fernando", "nota1" => 6, "nota2" => 5, "frequencia" => 60],
    ["nome" => "Mateus", "nota1" => 8, "nota2" => 6, "frequencia" => 88],
    ["nome" => "Julia", "nota1" => 7, "nota2" => 4, "frequencia" => 75],
];


function mostrarAluno($aluno){
    $media = ($aluno["nota1"] + $aluno["nota2"]) / 2;
    $situacao = (($media >= 6 && $aluno["frequencia"] >= 75) ? "Aprovado!" : "Reprovado!");

    echo "<h2>Nome: ".$aluno["nome"]."</h2>";
    echo "<p>Nota1: ".$aluno["nota1"]."<br>";
    echo "Nota2: ".$aluno["nota2"]."<br>";
    echo "Media: $media<br>";
    echo "Frequencia: ".$aluno["frequencia"]."%<br>";
    echo "Situação: $situacao</p>";
}

foreach ($alunos as $aluno){
    mostrarAluno($aluno);
    echo "<hr>";
}