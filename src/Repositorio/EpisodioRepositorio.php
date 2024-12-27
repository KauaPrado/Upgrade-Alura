<?php

namespace ScreenMatch\Repositorio; 

use PDO;
use ScreenMatch\Modelo\Avaliavel;
use ScreenMatch\Modelo\Episodio;
use ScreenMatch\Modelo\Serie;

class EpisodioRepositorio implements Avaliavel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(Episodio $episodio): bool
    {
        $sql = 'INSERT INTO Episodio (
                                    serie,
                                    nome,
                                    numero,
                                    idSerie
                                    ) 
                VALUES (
                        :serie,
                        :nome,
                        :numero,
                        :idSerie
                        )';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':serie', $episodio->getSerie(), PDO::PARAM_STR);
        $stmt->bindValue(':nome', $episodio->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':numero', $episodio->getNumero(), PDO::PARAM_INT);
        $stmt->bindValue(':idSerie', $episodio->getIdSerie(), PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function buscarEpisodio(string $serie, int $numero): ?Episodio
    {
        $sql = 'SELECT * FROM Episodio
                WHERE serie = :serie and numero = :numero';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':serie', $serie, PDO::PARAM_STR);
        $stmt->bindValue(':numero', $numero, PDO::PARAM_INT);
        $stmt->execute();
        
        $serieArray = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$serieArray) {
            return null; // Retorna null se a série não for encontrada
        }

        return new Episodio(
            $serieArray['idEpisodio'],
            $serieArray['serie'],
            $serieArray['nome'],
            $serieArray['numero'],
            $serieArray['idSerie']
        );
    }

    public function avalia(float $nota, int $id): void
    {
        $sql = 'UPDATE Episodio
                SET avaliacao = avaliacao + :nota,
	                numDeAvaliacoes = numDeAvaliacoes+ 1
                where idEpisodio = :id;';
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
