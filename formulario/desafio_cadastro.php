
<form method="POST">
    <label>Nome completo do aluno:</label><br>
    <input type="text" name="nome"><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2"><br><br>

    <label>Frequencia (%):<label><br>
    <input type="number" name="frequencia"><br><br>

    <label>Curso:</label><br>
    <input type="text" name="curso"><br><br>

    <input type="submit" value="Verificar situação"><br>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $frequencia = $_POST["frequencia"];
    $curso = $_POST["curso"];
    

    if(isset($nome, $nota1, $nota2, $frequencia, $curso) && $nome !== '' && $curso !== ''){
        if($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10){
            echo "<br>As notas devem ser entre 0 e 10";
            exit();
        }

        if($frequencia < 0 || $frequencia > 100){
            echo "<br>A frequência deve estar entre 0% e 100%.";
            exit();
        }

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
        echo "<br>Todos os campos devem ser preenchidos!";
    }
}
