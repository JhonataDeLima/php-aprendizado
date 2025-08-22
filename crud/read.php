<?php 
require_once 'connection.php';

$sql = 'SELECT * FROM usuarios';

$stmt = $pdo->prepare($sql);
$result = $stmt->execute();

if($result){
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $linha){
        echo $linha['nome']."<br>";
        echo $linha['telefone']."<br>";
        echo "<hr>";
    }
}