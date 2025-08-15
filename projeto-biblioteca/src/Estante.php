<?php
namespace jhon\biblioteca;

class Estante {
    
    private array $livros = [];

    public function adicionarLivro(Livro $livro): void
    {
        $livro->marcarComoDisponivel();
        $this->livros[] = $livro;
    }

    public function removerLivro(Livro $livro): void
    {
        $this->livros = array_filter($this->livros, fn($livroAtual) => $livroAtual !== $livro);
    }

    public function verificarLivro(Livro $livro): bool
    {
        return in_array($livro, $this->livros);
    }

    public function buscarLivroPorTitulo(string $titulo): ?Livro
    {
        foreach ($this->livros as $livro){
            if (str_contains(strtolower($livro->getTitulo()), strtolower($titulo)) !== false) {
                return $livro;
            }
        }
        return null;
    }

    public function listarLivrosDisponiveis(): array
    {
        return array_filter($this->livros, function($livroAtual)
        {
            return $livroAtual->estadisponivel();
        });
    }
}