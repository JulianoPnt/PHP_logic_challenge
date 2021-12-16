-- Used PostgreSQL latest image from Docker hub

CREATE DATABASE bling;
\c bling;

CREATE TABLE IF NOT EXISTS Ator
(
    id   SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL
);

CREATE TABLE IF NOT EXISTS Diretor
(
    id   SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL
);

CREATE TABLE IF NOT EXISTS Filme
(
    id     SERIAL PRIMARY KEY,
    titulo VARCHAR(45) NOT NULL,
    ano    smallint    NOT NULL
);

CREATE TABLE IF NOT EXISTS Participa
(
    id      SERIAL PRIMARY KEY,
    idAtor  INT NOT NULL,
    idFilme INT NOT NULL,
    FOREIGN KEY (idAtor) REFERENCES Ator (id),
    FOREIGN KEY (idFilme) REFERENCES Filme (id)
);

CREATE TABLE IF NOT EXISTS Dirige
(
    id        SERIAL PRIMARY KEY,
    idDiretor INT NOT NULL,
    idFilme   INT NOT NULL,
    FOREIGN KEY (idDiretor) REFERENCES Diretor (id),
    FOREIGN KEY (idFilme) REFERENCES Filme (id)
);

-- Tornando visualização mais fácil
CREATE VIEW Filmes AS
SELECT F.titulo,
    F.ano,
    A.nome as NomeAtor,
    D.nome as NomeDiretor
FROM Filme AS F
    INNER JOIN Dirige AS Dg ON Dg.idFilme = F.id
    INNER JOIN Diretor D on Dg.idDiretor = D.id
    INNER JOIN Participa AS P ON P.idFilme = F.id
    INNER JOIN Ator A on P.idAtor = A.id;

-- Facilitando inserção de dados
CREATE FUNCTION filme_inserção()
    RETURNS TRIGGER
    LANGUAGE PLPGSQL
AS
$$
BEGIN
    INSERT INTO Ator (nome)
    VALUES (NEW.NomeAtor);
    INSERT INTO Diretor (nome)
    VALUES (NEW.NomeDiretor);
    INSERT INTO Filme (titulo, ano)
    VALUES (NEW.titulo, NEW.ano);

    INSERT INTO Participa (idAtor, idFilme)
    VALUES ((SELECT id FROM Ator WHERE nome = NEW.NomeAtor),
            (SELECT id FROM Filme WHERE titulo = NEW.titulo AND ano = NEW.ano));
    INSERT INTO Dirige (idDiretor, idFilme)
    VALUES ((SELECT id FROM Diretor WHERE nome = NEW.NomeDiretor),
            (SELECT id FROM Filme WHERE titulo = NEW.titulo AND ano = NEW.ano));
    RETURN NEW;
END;
$$

CREATE TRIGGER inserir_filmes
    INSTEAD OF INSERT
    ON Filmes
    FOR EACH ROW
EXECUTE PROCEDURE filme_inserção();


-- Inserindo dados
INSERT INTO Filmes(titulo, ano, NomeAtor, NomeDiretor)
    VALUES ('Jurassic World', 2015, 'Chris Pratt', 'Colin Trevorrow'),
        ('The Avengers', 2012, 'Robert Downey Jr', 'Joe Russo'),
        ('Sonic The movie', 2020, 'Jim Carrey', 'Jeff Fowler');

SELECT * FROM Filmes