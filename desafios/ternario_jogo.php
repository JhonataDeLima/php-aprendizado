<?php

$temChave = true;
$estaChovendo = true;
$temBateria = false;

echo "<p>".(($temChave) ? "Pode abrir a porta" : "Vai precisar da chave")."</p>";
echo "<p>".(($estaChovendo) ? "Leve um guarda-chuva" : "Tempo limpo!")."</p>";
echo "<p>".(($temBateria) ? "Celular funcionando" : "Precisa carregar o celular")."</p>";
