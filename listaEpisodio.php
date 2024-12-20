<?php

namespace ScreenMatch;

require_once 'vendor/autoload.php';


use ScreenMatch\ConnectionCreator;
use ScreenMatch\Modelo\Serie;

// ... resto do código
use PDO;
use ScreenMatch\Repositorio\EpisodioRepositorio;
use ScreenMatch\Repositorio\SerieRepositorio;

$pdo = ConnectionCreator::createConnection();

$serie = new Serie(null, 'Mandalorian', "2019", 'Aventura', 3, 10, 40);

$repositorio = new EpisodioRepositorio($pdo);

$episodioSelecionado = $repositorio->buscarEpisodio("Attack on Titan", 1);
// if ($repositorio->adicionar($serie)) {
//     echo "Serie inserido com sucesso!";
// } else {
//     echo "Falha ao inserir a serie.";
// }
var_dump($episodioSelecionado);
