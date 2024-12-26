<?php
namespace ScreenMatch;


use ScreenMatch\Modelo\{
    Filme, Episodio, Serie, Genero
};
use ScreenMatch\ConnectionCreator;

require_once 'vendor/autoload.php';


use PDO;

$pdo = ConnectionCreator::createConnection();

$sqlQuery = 'SELECT * FROM Filme;';
$stmt = $pdo->query($sqlQuery);

// Obter todos os resultados
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Instanciar objetos de Filme e exibir os resultados
foreach ($resultados as $linha) {
    $filme = new Filme($linha['id_filme'], $linha['nome'], $linha['anoLancamento'], $linha['genero'], $linha['duracaoEmMinutos']); // Passa o ID e o título ao construtor
    var_dump($filme);
    $filme->avalia(9);
    echo $filme->media();
}
