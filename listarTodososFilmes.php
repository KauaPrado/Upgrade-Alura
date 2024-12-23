<?php

namespace ScreenMatch;

require_once 'vendor/autoload.php';


use ScreenMatch\Repositorio\EpisodioRepositorio;
use ScreenMatch\ConnectionCreator;
use ScreenMatch\Modelo\Serie;

use ScreenMatch\Modelo\Episodio;

// ... resto do código
use PDO;
use ScreenMatch\Modelo\Filme;
use ScreenMatch\Repositorio\FilmeRepositorio;

$pdo = ConnectionCreator::createConnection();

$serie = new Serie(null, 'Attack on Titan', "2013", 'seinen', 4, 20, 20);

$filmeRepositorio = new FilmeRepositorio($pdo);
// if ($serieRepositorio->adicionar($serie)) {
//     echo "Serie inserido com sucesso!";
// } else {
//     echo "Falha ao inserir a serie.";
// }

// $episodio = new Episodio(null, $serie->getNome(), "de você, 2000 anos depois",  1, $serieRepositorio->buscarIdporNome("Attack On Titan"));
// echo "<br>";
// var_dump($serie);
// echo "<br>";
// $episodioRepositorio = new EpisodioRepositorio($pdo);
// if ($episodioRepositorio->adicionar($episodio)) {
//     echo "episodio inserido com sucesso!";
// } else {
//     echo "Falha ao inserir o episodio.";
// }

$lista = $filmeRepositorio->listarTododOsFilmes();
var_dump($lista);
//pegando todos os episodios a partir do id da série 
if (!empty($lista)) {
     foreach ($lista as ['nome' => $nomeSerie, 'genero' =>$genero]) { // Desestruturação de array
         echo $nomeSerie . " |  Genêro: " . $genero . "\n";
     }
 }
 
