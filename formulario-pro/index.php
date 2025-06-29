<?php
session_start();
require_once "funcoes.php";
require_once "layout/header.php";

$dados = $_POST ?? [];
$erros = [];

if (isset($_POST["limpar"])) {
    unset($_SESSION["alunos"]);
    echo "<p class='sucesso'>✔️ Dados limpos com sucesso!</p>";
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $erros = validarFormulario($dados);

    if (empty($erros)) {
        $_SESSION["alunos"][] = $dados;
    }
}
?>

<form method="POST">
    <label>Nome do aluno:</label><br>
    <input type="text" name="nome" value="<?= $dados["nome"] ?? "" ?>"><br><br>

    <label>Curso:</label><br>
    <input type="text" name="curso" value="<?= $dados["curso"] ?? "" ?>"><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1" value="<?= $dados["nota1"] ?? "" ?>"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2" value="<?= $dados["nota2"] ?? "" ?>"><br><br>

    <label>Frequência (%):</label><br>
    <input type="number" name="frequencia" value="<?= $dados["frequencia"] ?? "" ?>"><br><br>

    <input type="submit" value="Salvar">
    <input type="submit" name="limpar" value="Limpar"><br><br>
</form>

<?php
if (!empty($erros)) {
    foreach ($erros as $erro) {
        echo "<p class='erro'>$erro</p>";
    }
}

if (!empty($_SESSION["alunos"])) {
    foreach ($_SESSION["alunos"] as $aluno) {
        exibirAluno($aluno);
        echo "<hr>";
    }
}

require_once "layout/footer.php";