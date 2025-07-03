<?php

require('constants.php');
require_once('functions.php');

$nome = 'João';
$idade = 25;
$sexo = 'M';
$salario_mensal = 2210.30;
$esta_empregado = true;
$habilidades = ['PHP', 'JavaScript', 'HTML', 'CSS'];


$salario_anual = calcular_salario_anual($salario_mensal);
$anos_restantes_para_aposentar = calcular_tempo_restante_para_aposentadoria($idade, $sexo);
$anos_necessario_para_aposentar = ($sexo == 'M') ? IDADE_APOSENTADORIA_MASCULINA : IDADE_APOSENTADORIA_FEMININA;

?>

<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Ficha Cadastral</h1>
            <p>Nome: <strong><?= $nome; ?></strong></p>
            <p>Idade: <strong><?= $idade; ?></strong></p>
            <p>Sexo: <strong><?= $sexo; ?></strong></p>
            <p>Salario Mensal: <strong><?= converter_numero_para_real($salario_mensal); ?></strong></p>
            <p>Salario Anual: <strong><?= converter_numero_para_real($salario_anual); ?></strong></p>
            <p>Status de Emprego: <strong><?= $esta_empregado == true ? 'Empregado' : 'Desempregado'; ?></strong></p>
            <p>Anos para Aposentadoria: <strong><?= $anos_restantes_para_aposentar; ?></strong></p>
            <p>Habilidades: <strong><?= implode(', ', $habilidades); ?></strong><p>
        </div>
    </div>
</body>