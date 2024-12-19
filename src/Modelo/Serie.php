<?php

namespace ScreenMatch\Modelo;

class Serie extends Titulo
{
    private ?int $id;
    private string $nome;
    private int $anoLancamento;
    private string $genero;
    private int $temporadas;
    private int $episodiosPorTemporada;
    private int $minutosPorEpisodio;

    public function __construct(
        ?int $id,
        string $nome,
        int $anoLancamento,
        string $genero,
        int $temporadas,
        int $episodiosPorTemporada,
        int $minutosPorEpisodio
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->anoLancamento = $anoLancamento;
        $this->genero = $genero;
        $this->temporadas = $temporadas;
        $this->episodiosPorTemporada = $episodiosPorTemporada;
        $this->minutosPorEpisodio = $minutosPorEpisodio;
    }

    #[\Override]
    public function duracaoEmMinutos(): int
    {
        return $this->temporadas * $this->episodiosPorTemporada * $this->minutosPorEpisodio;
    }

    // Getters e Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getAnoLancamento(): int
    {
        return $this->anoLancamento;
    }

    public function setAnoLancamento(int $anoLancamento): void
    {
        $this->anoLancamento = $anoLancamento;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    public function getTemporadas(): int
    {
        return $this->temporadas;
    }

    public function setTemporadas(int $temporadas): void
    {
        $this->temporadas = $temporadas;
    }

    public function getEpisodiosPorTemporada(): int
    {
        return $this->episodiosPorTemporada;
    }

    public function setEpisodiosPorTemporada(int $episodiosPorTemporada): void
    {
        $this->episodiosPorTemporada = $episodiosPorTemporada;
    }

    public function getMinutosPorEpisodio(): int
    {
        return $this->minutosPorEpisodio;
    }

    public function setMinutosPorEpisodio(int $minutosPorEpisodio): void
    {
        $this->minutosPorEpisodio = $minutosPorEpisodio;
    }
}
