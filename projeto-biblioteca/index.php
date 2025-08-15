<?php
require_once 'vendor/autoload.php';
use \Jhon\Biblioteca\Livro;
use \Jhon\Biblioteca\Estante;

use \Jhon\Biblioteca\Aluno;
use \Jhon\Biblioteca\Professor;
use \Jhon\Biblioteca\Bibliotecario;

echo "Sistema de biblioteca<br>";

$livro = new Livro ('PHP OOP', 'b7web');
$livro1 = new Livro ('JAVA', 'b7web');
$livro2 = new Livro ('PYTHON', 'b7web');

$estante = new Estante();
$estante->adicionarLivro($livro);
$estante->adicionarLivro($livro1);
$estante->adicionarLivro($livro2);

$aluno = new Professor('Jhonata');
$aluno2 = new Aluno('Mateus');

Bibliotecario::emprestarLivro($aluno, $livro2, $estante);
Bibliotecario::emprestarLivro($aluno, $livro1, $estante);
echo "<pre>";
echo "<hr>";
print_r($aluno);


echo "<hr>";


