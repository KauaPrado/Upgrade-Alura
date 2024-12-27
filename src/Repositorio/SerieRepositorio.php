<?php

namespace ScreenMatch\Repositorio; 

use PDO;
use ScreenMatch\Modelo\Avaliavel;
use ScreenMatch\Modelo\Episodio;
use ScreenMatch\Modelo\Serie;

class SerieRepositorio implements Avaliavel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(Serie $serie): bool
    {
        $sql = 'INSERT INTO Serie (nome,
                                    anoLancamento,
                                    genero,
                                    temporadas, 
                                    episodiosPorTemporada, 
                                    minutosPorEpisodio) 
                VALUES (:nome, 
                        :anoLancamento, 
                        :genero, 
                        :temporadas, 
                        :episodiosPorTemporada, 
                        :minutosPorEpisodio)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $serie->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':anoLancamento', $serie->getAnoLancamento(), PDO::PARAM_INT);
        $stmt->bindValue(':genero', $serie->getGenero(), PDO::PARAM_STR);
        $stmt->bindValue(':temporadas', $serie->getTemporadas(), PDO::PARAM_INT);
        $stmt->bindValue(':episodiosPorTemporada', $serie->getEpisodiosPorTemporada(), PDO::PARAM_INT);
        $stmt->bindValue(':minutosPorEpisodio', $serie->getMinutosPorEpisodio(), PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function buscarIdporNome(string $nome): int|false // Usar tipo de retorno mais abrangente
{
    $sql = 'SELECT idSerie FROM Serie WHERE nome = :nome';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();

    $id = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém o resultado como um array associativo

    if ($id === false) { // Verifica se a consulta retornou algum resultado
        return false; // Retorna false se nenhum resultado for encontrado
    }

    return $id['idSerie']; // Retorna o valor do 'id'
}

    public function buscarPorId(int $id): ?Serie
    {
        $sql = 'SELECT * FROM Serie WHERE idSerie = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $serieArray = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$serieArray) {
            return null; // Retorna null se a série não for encontrada
        }

        return new Serie(
            $serieArray['idSerie'],
            $serieArray['nome'],
            $serieArray['anoLancamento'],
            $serieArray['genero'],
            $serieArray['temporadas'],
            $serieArray['episodiosPorTemporada'],
            $serieArray['minutosPorEpisodio']
        );
    }

    public function listaEpisodios(int $idSerie): array
    {

        $sql = 'SELECT * FROM Episodio
                     WHERE idSerie = :idSerie';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idSerie', $idSerie, PDO::PARAM_INT);
        $stmt->execute();

        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lista = [];

        foreach ($result as $row) {
            
            $episodio = new Episodio($row['idEpisodio'], $row['serie'], $row['nome'], $row['numero'], $row['idSerie']);
            array_push($lista, $episodio);  
    }
        return $lista;

    }


    public function listarTodasAsSeries():array
    {
        $sql = 'select nome, genero from Serie';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listaSeries =  $stmt->fetchAll(PDO::FETCH_DEFAULT);
        
        return $listaSeries;
    }

    public function avalia(float $nota, int $id): void
    {
        $sql = 'UPDATE Serie
                SET avaliacao = avaliacao + :nota,
	                numDeAvaliacoes = numDeAvaliacoes+ 1
                where idSerie = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nota', $nota, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function media(int $id): float
    {
        return 2;
    }

}
