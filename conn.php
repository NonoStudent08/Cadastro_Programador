<?php
$conn = new PDO('sqlite:sqlite/programmer.db');

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'CREATE TABLE IF NOT EXISTS 
    Programador (
        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
        nome TEXT(60) NOT NULL DEFAULT "", 
        cpf TEXT(14) NOT NULL DEFAULT "", 
        email TEXT(256) NOT NULL DEFAULT "", 
        genero TEXT(15) NOT NULL DEFAULT "", 
        telefone TEXT(16) NOT NULL DEFAULT "", 
        dataNascimento TEXT(15) NOT NULL DEFAULT "", 
        linguagens TEXT(256) NOT NULL DEFAULT "", 
        cep TEXT(9) NOT NULL DEFAULT "", 
        numero INTEGER NOT NULL DEFAULT(0), 
        logradouro TEXT(15) NOT NULL DEFAULT "", 
        bairro TEXT(60) NOT NULL DEFAULT "", 
        uf TEXT(2) NOT NULL DEFAULT "", 
        cidade TEXT(60) NOT NULL DEFAULT "", 
        complemento TEXT(256) NOT NULL DEFAULT "", 
        imagem BLOB 
    )';

$conn->exec($query);
