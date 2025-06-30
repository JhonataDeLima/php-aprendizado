<?php
session_start();
require_once "layout/header.php";
require_once "funcoes.php";
?>

<form method="POST">
    <label>Nome da Turma: </label><br>
    <input type="text" name="turma" value="<?php echo $_POST["turma"] ?? ""; ?>"><br><br>
    <label>Curso: </label><br>
    <input type="text" name="curso" value="<?php echo $_POST["curso"] ?? ""; ?>"><br><br>
    <input type="submit" value="Salvar"><br>
    <input type="submit" name ="limpar" value="Limpar Turmas">
    <input type="hidden" name="formulario" value="turma">
</form>

<?php 

if (isset($_POST["formulario"]) && $_POST["formulario"] === "turma"){

    if(isset($_POST["limpar"])){
        unset($_SESSION["turmas"]);
        echo "✔️ Turmas apagadas!";
    }else{
        
        $erros = validarFormularioTurma($_POST);
        $nomeTurma = $_POST["turma"];
        $curso = $_POST["curso"];

        if (empty($erros)){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                if(!isset($_SESSION["turmas"][$nomeTurma])){
                    $_SESSION["turmas"][$nomeTurma] = [];
                }

                if(!in_array($curso, $_SESSION["turmas"][$nomeTurma])){
                    $_SESSION["turmas"][$nomeTurma][] = $curso;
                    echo "✅ Curso: $curso adicionado!<br><br>";

                }else{
                    echo "❌ $curso já existe na $nomeTurma!<br><br>";
                }
            }
        }else{
            foreach ($erros as $erro){
                echo "$erro <br>";
            }
        }
    }
}

?>

<form method="POST">
    <label>Nome do aluno:</label><br>
    <input type="text" name="nome" value="<?= $_POST["nome"] ?? "" ?>"><br><br>

    <label>Turma:</label><br>
    <select name="turma"><?php foreach($_SESSION["turmas"] as $turma => $curso) { echo "<option>$turma</option>";} ?></select><br><br>

    <label>Curso:</label><br>
    <select name="curso"><?php foreach($_SESSION["turmas"] as $turma => $cursos) { foreach($cursos as $curso){echo "<option>$curso</option>";}} ?></select><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1" value="<?= $_POST["nota1"] ?? "" ?>"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2" value="<?= $_POST["nota2"] ?? "" ?>"><br><br>

    <label>Frequência (%):</label><br>
    <input type="number" name="frequencia" value="<?= $_POST["frequencia"] ?? "" ?>"><br><br>

    <input type="submit" value="Salvar">
    <input type="submit" name="limpar" value="Limpar Alunos"><br><br>
    <input type="hidden" name="formulario" value="aluno">
</form>

<?php

if (isset($_POST["formulario"]) && $_POST["formulario"] === "aluno"){

    if (isset($_POST["limpar"])) {
        unset($_SESSION["alunos"]);
        echo "<p class='sucesso'>✔️ Dados limpos com sucesso!</p>";
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

        $dados = $_POST ?? [];
        $erro = [];
        $erro = validarFormulario($dados);

        if (empty($erro)) {
            $_SESSION["alunos"][] = $dados;
        }
    }


    if (!empty($erro)) {
        foreach ($erro as $erro1) {
            echo "<p class='erro'>$erro1</p>";
        }
    }

    if (!empty($_SESSION["alunos"])) {
        foreach ($_SESSION["alunos"] as $aluno) {
            exibirAluno($aluno);
            echo "<hr>";
        }
    }
}

require_once "layout/footer.php";

?>




