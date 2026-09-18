CREATE DATABASE gestao_estoque CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE gestao_estoque;

CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(50) NOT NULL
);

CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade INT NOT NULL,
    data_validade DATE NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

INSERT INTO categoria (descricao) VALUES
('Alimentos Básicos'), 
('Laticínios'),        
('Limpeza'),          
('Massas');    

INSERT INTO produto (categoria_id, nome, descricao, preco, quantidade, data_validade) VALUES
(1, 'Arroz Branco 5kg', 'Arroz agulhinha tipo 1', 23.50, 50, '2027-12-31'),
(1, 'Feijão Carioca 1kg', 'Feijão carioca tipo 1', 8.90, 80, '2027-06-30'),
(2, 'Leite Integral 1L', 'Leite de vaca integral longa vida', 5.49, 120, '2026-12-15'),
(3, 'Sabão em Pó 1kg', 'Sabão em pó fragrância lavanda', 12.99, 40, '2028-01-20'),
(4, 'Macarrão Espaguete 500g', 'Macarrão de sêmola com ovos', 4.75, 60, '2027-08-10');