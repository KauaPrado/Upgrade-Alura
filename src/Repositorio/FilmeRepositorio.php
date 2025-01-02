<?php

namespace ScreenMatch\Repositorio; 

use PDO;
use ScreenMatch\Modelo\Avaliavel;
use ScreenMatch\Modelo\Filme;

class FilmeRepositorio implements Avaliavel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(Filme $filme): bool
    {
        $sql = 'INSERT INTO Filme (nome, anoLancamento, genero, duracaoEmMinutos) VALUES (:nome, :ano_lancamento, :genero, :duracao_em_minutos)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $filme->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':ano_lancamento', $filme->getAnoLancamento(), PDO::PARAM_INT);
        $stmt->bindValue(':genero', $filme->getGenero(), PDO::PARAM_STR);
        $stmt->bindValue(':duracao_em_minutos', $filme->getDuracaoEmMinutos(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function listarTododOsFilmes():array
    {
        $sql = 'select nome, genero from Filme';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $listaFilmes =  $stmt->fetchAll(PDO::FETCH_DEFAULT);
        
        return $listaFilmes;
    }

    public function avalia(float $nota, int $id): void
    {
        $sql = 'UPDATE FILME
                SET avaliacao = avaliacao + :nota,
	                numDeAvaliacoes = numDeAvaliacoes+ 1
                where id_filme = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nota', $nota, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function media(int $id): float
    {
        $sql = 'select avaliacao / numDeavaliacoes as media from Filme where id_filme = :id;';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado);
        return $resultado["media"];
    }

}
