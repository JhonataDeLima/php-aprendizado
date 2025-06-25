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


function cadastrarAlunos(){
    $alunos = [
    [
        "nome" => "Jhonata",
        "nota1" => 7,
        "nota2" => 8,
        "frequencia" => 80
    ],
    [
        "nome" => "Maria",
        "nota1" => 5,
        "nota2" => 6,
        "frequencia" => 70
    ],
    [
        "nome" => "Carlos",
        "nota1" => 9,
        "nota2" => 9,
        "frequencia" => 90
    ]
];

    foreach ($alunos as $aluno){
        exibirResumo($aluno["nome"], $aluno["nota1"], $aluno["nota2"], $aluno["frequencia"]);
    }
}


cadastrarAlunos();