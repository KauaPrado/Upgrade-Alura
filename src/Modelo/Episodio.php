<?php

namespace ScreenMatch\Modelo;

class Episodio implements Avaliavel
{
    use ComAvaliacao;
    private ?int $idEpisodio;
    private string $serie;
    private string $nome;
    private int $numero;
    private int $idSerie;

    public function __construct(
        ?int $idEpisodio,
        Serie $serie,
        string $nome,
        int $numero
    ) {
        $this->idEpisodio = $idEpisodio;
        $this->serie = $serie->getNome();
        $this->nome = $nome;
        $this->numero = $numero;
        $this->idSerie = $serie->getId();
    }

    // Getters e Setters
    public function getIdEpisodio(): ?int
    {
        return $this->idEpisodio;
    }

    public function setIdEpisodio(?int $idEpisodio): void
    {
        $this->idEpisodio = $idEpisodio;
    }

    public function getSerie(): string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): void
    {
        $this->serie = $serie;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getIdSerie(): int
    {
        return $this->idSerie;
    }

    public function setIdSerie(int $idSerie): void
    {
        $this->idSerie = $idSerie;
    }
}
