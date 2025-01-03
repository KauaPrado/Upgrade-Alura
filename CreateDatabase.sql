create database screenmatch;

use screenmatch;

create table Filme
(id_filme integer primary KEY auto_increment,
nome Varchar(35),
anoLancamento VARCHAR(4),
genero varchar(11),
duracaoEmMinutos int,
avaliacao float default 0,
numDeAvaliacoes int default 0);


create table Serie
(idSerie integer primary KEY auto_increment,
nome Varchar(35),
anoLancamento VARCHAR(4),
genero varchar(11),
temporadas int,
episodiosPorTemporada int,
minutosPorEpisodio int,
avaliacao float default 0,
numDeAvaliacoes int default 0
);

create table episodio
(
idEpisodio integer primary KEY auto_increment,
serie varchar(35),
nome varchar(40),
numero int,
avaliacao float default 0,
numDeAvaliacoes int default 0,
idSerie int,
FOREIGN KEY (idSerie) REFERENCES Serie(idSerie));
