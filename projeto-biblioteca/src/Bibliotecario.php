<?php
namespace Jhon\Biblioteca;

use Exception;

class Bibliotecario {
    public static function emprestarLivro(Usuario $usuario, Livro $livro, Estante $estante)
    {
        if(!$livro->estadisponivel()){
            throw new Exception("O livro não está disponivel.");
            return false;
        }

        if(!$usuario->podePegarEmprestado()){
            throw new Exception("Não pode pegar livro emprestado.");
            return false;
        }

        if(!$estante->verificarLivro($livro)){
            throw new Exception("O livro não está na estante.");
            return false;
        }

        $livro->marcarComoEmprestado();
        $usuario->adicionarLivroEmprestado($livro);
        $estante->removerLivro($livro);

        return true;
    }

    public static function devolverLivro(Usuario $usuario, Livro $livro, Estante $estante){


        if (\in_array($livro, $usuario->listarLivrosEmprestados())){
            throw new Exception("O livro não está com o usuario.");
            return false;
        }

        if($livro->estadisponivel()){
            throw new Exception("O livro já está disponivel.");
            return false;
        }

        if($estante->verificarLivro($livro)){
            throw new Exception("O livro já está na estante");
            return false;
        }

        $usuario->removerLivroEmprestado($livro);
        $estante->adicionarLivro($livro);
        $livro->marcarComoDisponivel();

        return true;
    }
}