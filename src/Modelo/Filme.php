<?php
namespace ScreenMatch\Modelo;

use PDO;


class Filme extends Titulo
{
    
    private ?int $id;
    private string $nome;
    private int $anoLancamento;
    private string $genero;
    private int $duracaoEmMinutos;

    public function __construct(
        ?int $id,
        string $nome,
        int $anoLancamento,
        string $genero, 
        int $duracaoEmMinutos
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->anoLancamento = $anoLancamento;
        $this->genero = $genero;
        $this->duracaoEmMinutos = $duracaoEmMinutos;
    }

    #[\Override]
    public function duracaoEmMinutos(): int
    {
        return $this->duracaoEmMinutos;
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

    public function getDuracaoEmMinutos(): int
    {
        return $this->duracaoEmMinutos;
    }

    public function setDuracaoEmMinutos(int $duracaoEmMinutos): void
    {
        $this->duracaoEmMinutos = $duracaoEmMinutos;
    }

    
}
