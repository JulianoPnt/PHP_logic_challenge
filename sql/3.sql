-- Used PostgreSQL latest image from Docker hub

-- A. Atores do filme com título “XYZ”.
SELECT nome FROM ator
    INNER JOIN participa p on ator.id = p.idator
    INNER JOIN filme f on f.id = p.idfilme
    WHERE f.titulo = 'XYZ';

-- B. Filmes que o ator de nome “FULANO” participou.
SELECT nome FROM ator a
    INNER JOIN participa p on a.id = p.idator
    INNER JOIN filme f on f.id = p.idfilme
    WHERE a.nome = 'Fulano';

-- C. Listar os filmes do ano 2015 ordenados pela quantidade de atores participantes e pelo título em ordem alfabética.
SELECT f.titulo, count(a.id) AS numero_atores
FROM filme f
    INNER JOIN participa p ON f.id = p.idfilme
    INNER JOIN ator a ON a.id = p.idator
WHERE ano = 2015
GROUP BY f.titulo
ORDER BY numero_atores DESC, titulo ASC;


-- D. Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”.
SELECT ator.nome FROM ator
    INNER JOIN participa p on ator.id = p.idator
    INNER JOIN filme f on f.id = p.idfilme
    INNER JOIN dirige d on f.id = d.idfilme
    INNER JOIN diretor d2 on d2.id = d.iddiretor
    WHERE d2.nome = 'SPIELBERG'