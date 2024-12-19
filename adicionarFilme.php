<?php

namespace ScreenMatch;

require_once 'vendor/autoload.php';


use ScreenMatch\Repositorio\FilmeRepositorio; // Importa a classe FilmeRepositorio
use ScreenMatch\ConnectionCreator;
use ScreenMatch\Modelo\Filme;

// ... resto do código
use PDO;

$pdo = ConnectionCreator::createConnection();

$filme = new Filme(null, 'Star Wars: Ataque dos Clones', 2002, 'Aventura', 180);

$repositorio = new FilmeRepositorio($pdo);
if ($repositorio->adicionar($filme)) {
    echo "Filme inserido com sucesso!";
} else {
    echo "Falha ao inserir o filme.";
}
