<?php
require_once 'connection.php';

$id = 22;
$novoNome = 'Cynthia Gata';
$novoEmail = 'cynthia@gmail';
$novaSenha = '123455';

$sql = 'UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nome' , $novoNome);
$stmt->bindValue(':email', $novoEmail);
$stmt->bindValue(':senha', $novaSenha);
$stmt->bindValue(':id', $id);

$queryExecute = $stmt->execute();

if ($queryExecute){
    echo "atualizado!";
}else{
    echo "erro ao atualizar!";
}