<?php
session_start();

// Validar campos
function validarFormulario($dados){
    $erros = [];

    if (empty($dados["nome"])){
        $erros[] = "O Campo Nome é obrigatório!";
    }

    if (empty($dados["curso"])){
        $erros[] = "O Campo Curso é obrigatório!";
    }

    if (!is_numeric($dados["nota1"]) || empty($dados["nota1"]) || $dados["nota1"] < 0 || $dados["nota1"] > 10){
        $erros[] = "Nota 1 deve ser entre 0 e 10.";
    }

    if (!is_numeric($dados["nota2"]) || empty($dados["nota2"]) || $dados["nota2"] < 0 || $dados["nota2"] > 10){
        $erros[] = "Nota 2 deve ser entre 0 e 10.";
    }

    if (!is_numeric($dados["frequencia"]) || empty($dados["frequencia"]) || $dados["frequencia"] < 0 || $dados["frequencia"] > 100){
        $erros[] = "Frequência deve ser entra 0 e 100.";
    }
    
    return $erros;
}

// Calcular media
function calcularMedia($nota1, $nota2){
    return ($nota1 + $nota2) /2;
}


// Verificar situação
function verificarSituacao($media, $frequencia){
    $situacao = ($media >= 6 && $frequencia >= 75) ? "Aprovado!" : "Reprovado!";

    return $situacao;
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

    <label>Nome: </label><br>
    <input type="text" name="nome" value="<?php echo $_POST["nome"] ?? ""; ?>"><br><br>

    <label>Curso: </label><br>
    <input type="text" name="curso" value="<?php echo $_POST["curso"] ?? ""; ?>"><br><br>

    <label>Nota 1: </label><br>
    <input type="number" name="nota1" value="<?php echo $_POST["nota1"] ?? ""; ?>"><br><br>

    <label>Nota 2: </label><br>
    <input type="number" name="nota2" value="<?php echo $_POST["nota2"] ?? ""; ?>"><br><br>

    <label>Frequência (%): </label><br>
    <input type="number" name="frequencia" value="<?php echo $_POST["frequencia"] ?? ""; ?>"><br><br>
    <input type="submit" value="Adicionar"><br><br>
    <input type="submit" name="limpar" value="Limpar"><br><br>

</form>


<?php

if (isset($_POST["limpar"])) {
    unset($_SESSION["alunos"]);
    echo "<p style='color: green;'>✔️ Dados limpos com sucesso!</p>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $novoAluno = $_POST;
    $erros = validarFormulario($novoAluno);

    if(empty($erros)){

        $_SESSION["alunos"][] = $novoAluno;

        foreach ($_SESSION["alunos"] as $aluno){

            $media = calcularMedia($aluno["nota1"], $aluno["nota2"]);
            $situacao = verificarSituacao($media, $aluno["frequencia"]);
            exibirResultado($aluno, $media, $situacao);
        }

    }else{
        foreach($erros as $erro){
            echo "<p style='color:red;'>$erro</p>";
        }
    }
}