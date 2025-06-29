<?php

function validarFormulario($dados) {
    $erros = [];

    if (empty($dados["nome"])) $erros[] = "⚠️ Nome é obrigatório.";
    if (empty($dados["curso"])) $erros[] = "⚠️ Curso é obrigatório.";
    if (!is_numeric($dados["nota1"]) || $dados["nota1"] < 0 || $dados["nota1"] > 10)
        $erros[] = "⚠️ Nota 1 deve estar entre 0 e 10.";
    if (!is_numeric($dados["nota2"]) || $dados["nota2"] < 0 || $dados["nota2"] > 10)
        $erros[] = "⚠️ Nota 2 deve estar entre 0 e 10.";
    if (!is_numeric($dados["frequencia"]) || $dados["frequencia"] < 0 || $dados["frequencia"] > 100)
        $erros[] = "⚠️ Frequência deve estar entre 0% e 100%.";

    return $erros;
}

function calcularMedia($n1, $n2) {
    return ($n1 + $n2) / 2;
}

function verificarSituacao($media, $frequencia) {
    return ($media >= 6 && $frequencia >= 75) ? "✅ Aprovado" : "❌ Reprovado";
}

function exibirAluno($dados) {
    $media = calcularMedia($dados["nota1"], $dados["nota2"]);
    $situacao = verificarSituacao($media, $dados["frequencia"]);

    echo "<div class='resultado'>";
    echo "<h2>Aluno: {$dados['nome']}</h2>";
    echo "<p><strong>Curso:</strong> {$dados['curso']}<br>";
    echo "<strong>Nota 1:</strong> {$dados['nota1']}<br>";
    echo "<strong>Nota 2:</strong> {$dados['nota2']}<br>";
    echo "<strong>Média:</strong> $media<br>";
    echo "<strong>Frequência:</strong> {$dados['frequencia']}%<br>";
    echo "<strong>Situação:</strong> $situacao</p>";
    echo "</div>";
}