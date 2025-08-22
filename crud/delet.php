<?php
require_once 'connection.php';

$id = 27;

$sql = 'DELETE FROM usuarios WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0){
    echo $stmt->rowCount() . ' Usuarios deletados';
}else{
    echo "nenhum usuario deletado";
}