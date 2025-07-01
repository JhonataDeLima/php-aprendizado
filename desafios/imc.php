<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?php echo $_POST["nome"] ?? "";?>"><br><br>

    <label>Peso(em kg separado por ponto ex: 70.5):</label><br>
    <input type="text" name="peso" value="<?php echo $_POST["peso"] ?? "";?>"><br><br>

    <label>Altura (em metros separado por ponto ex: 1.78):</label><br>
    <input type="text" name="altura" value="<?php echo $_POST["altura"] ?? "";?>"><br><br>
    <input type="submit" value="Calcular IMC"><br><br>
</form>

<?php

function validarForm($dados){
    $erros = [];

    if (empty($dados["nome"])){
        $erros [] = "O Campo Nome é Obrigatório!";
    }

    if (!is_numeric($dados["peso"]) || $dados["peso"] <= 0){
        $erros [] = "O Peso deve ser maior que 0!";
    }

    if (!is_numeric($dados["altura"]) || $dados["altura"] <= 0){
        $erros [] = "A Altura deve ser maior que 0!";
    }

    return $erros;
}


function calcularImc($peso, $altura){
    $imc = $peso / ($altura * $altura);
    return number_format($imc, 2, '.', '');
}

function verificarSituacao($imc){
    
    if ($imc < 18.5){
        return "Abaixo do peso";

    } elseif ($imc < 25){
        return "Peso normal";

    } elseif ($imc < 30){
        return "Sobrepeso";

    } else {
        return "Obesidade";
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $dados = $_POST;
    $erros = validarForm($dados);

    if(empty($erros)){
        $imc = calcularImc(floatval($dados["peso"]), floatval($dados["altura"]));
        $situacao = verificarSituacao($imc);

        echo "<h2>Nome: {$dados["nome"]}</h2>";
        echo "<p>Peso: {$dados["peso"]} KG<br>";
        echo "Altura: {$dados["altura"]} Metros<br>";
        echo "IMC: $imc<br>";
        echo "Situação: $situacao</p>";
    }else{
        foreach ($erros as $erro) {
            echo "$erro<hr>";
        }
    }
}
?>