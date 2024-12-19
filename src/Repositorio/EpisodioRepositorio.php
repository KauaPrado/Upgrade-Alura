<?php

namespace ScreenMatch\Repositorio; 

use PDO;
use ScreenMatch\Modelo\Episodio;
use ScreenMatch\Modelo\Serie;

class EpisodioRepositorio
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
}
