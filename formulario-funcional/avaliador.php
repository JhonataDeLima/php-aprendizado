<?php

// Valida os dados do formulário
function validarFormulario($dados) {
    $erros = [];

    if (empty($dados["nome"])) {
        $erros[] = "⚠️ O campo Nome é obrigatório.";
    }

    if (empty($dados["curso"])) {
        $erros[] = "⚠️ O campo Curso é obrigatório.";
    }

    if (!is_numeric($dados["nota1"]) || $dados["nota1"] < 0 || $dados["nota1"] > 10) {
        $erros[] = "⚠️ A Nota 1 deve estar entre 0 e 10.";
    }

    if (!is_numeric($dados["nota2"]) || $dados["nota2"] < 0 || $dados["nota2"] > 10) {
        $erros[] = "⚠️ A Nota 2 deve estar entre 0 e 10.";
    }

    if (!is_numeric($dados["frequencia"]) || $dados["frequencia"] < 0 || $dados["frequencia"] > 100) {
        $erros[] = "⚠️ A Frequência deve estar entre 0% e 100%.";
    }

    return $erros;
}

// Calcula a média
function calcularMedia($nota1, $nota2) {
    return ($nota1 + $nota2) / 2;
}

// Verifica a situação
function verificarSituacao($media, $frequencia) {
    return ($media >= 6 && $frequencia >= 75) ? "Aprovado!" : "Reprovado!";
}

// Exibe os dados do aluno
function exibirResultado($dados, $media, $situacao) {
    echo "<h2>Aluno: {$dados['nome']}</h2>";
    echo "<p>Curso: {$dados['curso']}<br>";
    echo "Nota 1: {$dados['nota1']}<br>";
    echo "Nota 2: {$dados['nota2']}<br>";
    echo "Média: $media<br>";
    echo "Frequência: {$dados['frequencia']}%<br>";
    echo "Situação: $situacao</p>";
}
?>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= $_POST["nome"] ?? "" ?>"><br><br>

    <label>Curso:</label><br>
    <input type="text" name="curso" value="<?= $_POST["curso"] ?? "" ?>"><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1" value="<?= $_POST["nota1"] ?? "" ?>"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2" value="<?= $_POST["nota2"] ?? "" ?>"><br><br>

    <label>Frequência (%):</label><br>
    <input type="number" name="frequencia" value="<?= $_POST["frequencia"] ?? "" ?>"><br><br>

    <input type="submit" value="Verificar Situação">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dados = $_POST;
    $erros = validarFormulario($dados);

    if (empty($erros)) {
        $media = calcularMedia($dados["nota1"], $dados["nota2"]);
        $situacao = verificarSituacao($media, $dados["frequencia"]);
        exibirResultado($dados, $media, $situacao);
    } else {
        foreach ($erros as $erro) {
            echo "<p style='color:red;'>$erro</p>";
        }
    }
}
?>