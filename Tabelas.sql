
CREATE TABLE usuarios(
    id_usuario SERIAL PRIMARY KEY,
    senha VARCHAR(255)
);

CREATE TABLE autores(
    id_autor SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    pais VARCHAR(255)
);

CREATE TABLE livros(
    id_livro SERIAL PRIMARY KEY,
    isbn INTEGER,
    nome VARCHAR(255),
    autor INTEGER REFERENCES autores(id_autor),
    editora VARCHAR(255),
    ano DATE
);

CREATE TABLE clientes(
    id_cliente SERIAL PRIMARY KEY,
    matricula VARCHAR(255),
    nome VARCHAR(255),
    telefone VARCHAR(255)
);

CREATE TABLE retirada_livros(
    id_retirada SERIAL PRIMARY KEY,
    quantidade_vezes INTEGER,
    calculo_data_entrega DATE,
    cliente INTEGER REFERENCES clientes(id_cliente)
);

CREATE TABLE devolucao_livros(
    id_devolucao SERIAL PRIMARY KEY,
    verifica_atraso INTEGER
);