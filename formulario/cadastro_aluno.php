
<form method="POST">
    <label>Nome do aluno:</label><br>
    <input type="text" name="nome"><br><br>

    <label>Nota 1:</label><br>
    <input type="number" name="nota1"><br><br>

    <label>Nota 2:</label><br>
    <input type="number" name="nota2"><br><br>

    <label>Frequência (%):</label><br>
    <input type="number" name="frequencia"><br><br>

    <input type="submit" value="Calcular">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $frequencia = $_POST["frequencia"];

    $media = ($nota1 + $nota2) / 2;
    $situacao = ($media >= 6 && $frequencia >= 75) ? "Aprovado!" : "Reprovado!";

    echo "<h2>Resultado</h2>";
    echo "<p>Aluno: $nome <br>";
    echo "Média: $media <br>";
    echo "Frequência: $frequencia% <br>";
    echo "Situação: $situacao </p>";
}
?>