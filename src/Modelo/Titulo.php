<?php

namespace ScreenMatch\Modelo;

abstract class Titulo 
{
    

    public function __construct(
        private  string $nome,
        private  int $anoLancamento,
        private  string $genero,
    ) {
    }

    abstract public function duracaoEmMinutos(): int;
}
