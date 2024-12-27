<?php

namespace ScreenMatch\Modelo;

interface Avaliavel
{
    public function avalia(float $nota, int $id): void;
    public function media(int $id): float;
}
