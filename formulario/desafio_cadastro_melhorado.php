
<form method="POST">
    <label>Nome: </label><br>
    <input type="text" name="nome" value="<?php echo $_POST["nome"] ?? ""; ?>"><br><br>
    
    <label>Curso: </label><br>
    <input type="text" name="curso" value="<?php echo $_POST["curso"] ?? ""; ?>"><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1" value="<?php echo $_POST["nota1"] ?? ""; ?>"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2" value="<?php echo $_POST["nota2"] ?? ""; ?>"><br><br>

    <label>Frequência (%):</label><br>
    <input type="number" name="frequencia" value="<?php echo $_POST["frequencia"] ?? ""; ?>"><br><br>
    <input type="submit" value="Salvar"><br>
</form>

<?php

$erros = [];

if($_SERVER["REQUEST_METHOD"] === "POST"){

    // dados recebidos
    $nome = $_POST["nome"];
    $curso = $_POST["curso"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $frequencia = $_POST["frequencia"];

    // validações
    if(empty($nome)){
        $erros[] = "⚠️ O campo Nome é obrigatório.<br>";
    }

    if(empty($curso)){
        $erros[] = "⚠️ O campo Curso é obrigatório.<br>";
    }
    
    if(!is_numeric($nota1) || $nota1 < 0 || $nota1 > 10){
        $erros[] = "⚠️ A Nota 1 deve estar entre 0 e 10.<br>";
    }

    if(!is_numeric($nota2) || $nota2 < 0 || $nota2 > 10){
        $erros[] = "⚠️ A Nota 2 deve estar entre 0 e 10.<br>";
    }

    if(!is_numeric($frequencia) || $frequencia < 0 || $frequencia > 100){
        $erros[] = "⚠️ A Frequência deve estar entre 0% e 100%.<br>";
    }

    if(empty($erros)){
        $media = ($nota1 + $nota2) /2;
        $situacao = (($media >=6 && $frequencia >=75) ? "Aprovado!" : "Reprovado!");

        echo "<br><h2>Aluno: $nome</h2>";
        echo "<p>Curso: $curso<br>";
        echo "Nota 1: $nota1<br>";
        echo "Nota 2: $nota2<br>";
        echo "Media: $media<br>";
        echo "Frequencia: $frequencia%<br>";
        echo "Situação: $situacao</p>";
    }else{
        
        foreach($erros as $erro){
            echo "<p style='color: red;'>$erro</p>";
        }
    }

}