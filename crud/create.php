<?php
require_once 'connection.php';

$nome = 'fernando';
$email = 'fernando@mag';
$telefone = '9999999999';
$senha = '124232';

$sql = 'INSERT INTO usuarios (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':senha', $senha);
$stmt->execute();