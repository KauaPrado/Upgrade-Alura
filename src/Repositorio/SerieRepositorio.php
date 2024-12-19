<?php

namespace ScreenMatch\Repositorio; 

use PDO;
use ScreenMatch\Modelo\Serie;

class SerieRepositorio
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



    public function buscarPorId(int $id): ?Serie
    {
        $sql = 'SELECT * FROM Serie WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $serieArray = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$serieArray) {
            return null; // Retorna null se a série não for encontrada
        }

        return new Serie(
            $serieArray['id'],
            $serieArray['nome'],
            $serieArray['ano_lancamento'],
            $serieArray['genero'],
            $serieArray['temporadas'],
            $serieArray['episodiosPorTemporada'],
            $serieArray['minutosPorEpisodio']
        );
    }

}
