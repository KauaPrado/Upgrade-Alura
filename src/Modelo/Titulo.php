<?php

namespace ScreenMatch\Modelo;

abstract class Titulo implements Avaliavel
{
    use ComAvaliacao;

    public function __construct(
        private  string $nome,
        private  int $anoLancamento,
        private  string $genero,
    ) {
    }

    abstract public function duracaoEmMinutos(): int;
}
