<?php

namespace jhon\biblioteca;

use Exception;

abstract class Usuario {

    protected array $livrosEmprestados = [];
    
    public function __construct(protected string $nome)
    {
        $this->nome = $nome;
    }

    abstract function podePegarEmprestado(): bool;

    public function adicionarLivroEmprestado(Livro $livro): void
    {
        if ($this->podePegarEmprestado()){
            $this->livrosEmprestados[] = $livro;
        }else{
            throw new Exception("O usúario não pode pegar livros emprestados e está tentando!");
        }
        
    }

    public function removerLivroEmprestado(Livro $livro): void
    {
        $this->livrosEmprestados = array_filter(
            $this->livrosEmprestados,
            fn($livroAtual) => $livroAtual !== $livro
        );
    }

    public function listarLivrosEmprestados(){
        return $this->livrosEmprestados;
    }
}