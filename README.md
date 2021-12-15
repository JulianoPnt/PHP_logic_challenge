# Desafio de lógica PHP

## Todo o código foi escrito utilizando PHP 7.4.3
### A maioria dos exercícios foram feitas de maneira imperativa devido a ser somente um teste de lógica =D
## Todos os exercícios foram testados via command line
> Exemplo: php ex1/index.php

## Exercícios Algoritmos e lógica

* Como se trata de avaliação de lógica e não de conhecimento específico de linguagem, evitar
uso de funções nativas da linguagem;
* Todos os exercícios devem ler entradas.

---
### 1: Escrever um algoritmo que rotacione um array em k posições. Exemplo: o array [1,2,3,4,5,6] se for girado duas posições para a esquerda se torna [3,4,5,6,1,2]. Tente resolver sem usar uma cópia da array.

---
### 2: Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no início os números pares de forma crescente e, depois, os ímpares de forma decrescente.

---

### 3: Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial e final recebidos no formato dd/mm/aaaa. Não deve usar funções de data e hora.

---

### 4: Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais triângulos é possível formar usando estas medidas. Exemplo [abc], [abd]...

---
### 5: Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. (Não usar funções de busca em string).

---
### 6: Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano cartesiano e calcule a área do retângulo criado pela sobreposição. Deve receber como entrada dois retângulos formados por pontos, ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma saída informando a área calculada ou zero se não ocorrer sobreposição

---

### 7: Um algoritmo deve armazenar o mapa abaixo e listar os caminhos entre os pontos A e E.

![Image](https://i.imgur.com/wC30OGd.png)
---

## Exercícios Programação orientada à objetos e design patterns

### Implementar o padrão iterator no modelo abaixo. Apresentar o diagrama de classes e pseudocódigo.
![Image](https://i.imgur.com/PpjfPaq.png)

## Exercícios Programação orientada à objetos e design patterns
### Considere o diagrama ER abaixo:
![ER Model](https://i.imgur.com/59ymr2k.png)
### Com base nele:
1. Defina as cardinalidades mínimas e máximas.
2. Crie o esquema do banco e apresente o DDL utilizado.
3. Apresente o SQL para as seguintes consultas:
    - a. Atores do filme com título “XYZ”.
    - b. Filmes que o ator de nome “FULANO” participou.
    - c. Listar os filmes do ano 2015 ordenados pela quantidade de atores participantes e pelo
    título em ordem alfabética.
    - d. Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”.