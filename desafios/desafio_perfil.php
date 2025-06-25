<?php

$nome = "Jhonata";
$idade = 32;
$altura = 1.78;
$cidadeOndeMora = "João pessoa";
$estaEmpregado = true;
$estaEstudando = true;


echo "<h2> Nome: $nome </h2>";
echo "<p> Idade: $idade <br>";
echo "Altura: $altura <br>";
echo "Cidade onde mora: $cidadeOndeMora </p>";
echo "<p>".(($estaEmpregado) ? "Empregado atualmente" : "Buscando oportunidades")."</p>";
echo "<p>".(($estaEstudando) ? "Aluno de PHP em ação!" : "Precisa estudar mais PHP...")."</p>";