<?php

namespace jhon\biblioteca;

class Livro {
    
    //Propriedades privadas
    private bool $disponivel = false;

    //construtor da classe
    public function __construct(private string $titulo, private string $autor){}

    //Metodos
    public function estadisponivel(): bool{
        return $this->disponivel;
    }

    public function marcarComoEmprestado(){
        $this->disponivel = false;
    }

    public function marcarComoDisponivel(){
        $this->disponivel = true;
    }

    //Getters
    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getAutor(): string{
        return $this->autor;
    }

}