<?php

function validarCpf($cpf)
{

    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    $regex = '/^(\d)\1+$/';

    if (preg_match($regex, $cpf)) {
        return false;
    }

    if (strlen($cpf) != 11) {
        return false;
    }

    $sum = 0;

    for ($i = 0; $i < 9; $i++) {
        $sum += intval($cpf[$i]) * (10 - $i);
    }

    $dv1 = 11 - ($sum % 11);

    if ($dv1 >= 10) {
        $dv1 = 0;
    }

    if ($dv1 !== intval($cpf[9])) {
        return false;
    }
    $sum = 0;

    for ($i = 0; $i < 10; $i++) {
        $sum += intval($cpf[$i]) * (11 - $i);
    }

    $dv2 = 11 - ($sum % 11);

    if ($dv2 >= 10) {
        $dv2 = 0;
    }

    if ($dv2 !== intval($cpf[10])) {
        return false;
    }

    return true;
}

//verifica cpf ✔
//se existe linguagem selecionado ✔
//verifica se a imagem tem erro ✔

// echo '<pre>';

// var_dump($_POST);

// exit;

require_once 'conn.php';

if (count($_POST) > 0) {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    if (!validarCpf($cpf)) {
        echo 'CPF Inválido!';
        return;
    }

    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['dataNascimento'];


    if (!isset($_POST['linguagens'])) {
        echo 'Selecione ao menos uma linguagem de programação!';
        return;
    }
        $resultSelect = $_POST['linguagens'];
        $linguagens = implode(', ', $resultSelect);


    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];

    $imagem_blob = $_FILES['imagem']['tmp_name'] ? file_get_contents($_FILES['imagem']['tmp_name']) : '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $query = "INSERT INTO `Programador` 
                                (nome, 
                                cpf, 
                                email, 
                                genero,
                                telefone,
                                dataNascimento,
                                linguagens,
                                cep,
                                numero,
                                logradouro,
                                bairro,
                                uf,
                                cidade,
                                complemento,
                                imagem)
                             VALUES(
                                :nome, 
                                :cpf, 
                                :email, 
                                :genero,
                                :telefone,
                                :dataNascimento,
                                :linguagens,
                                :cep,
                                :numero,
                                :logradouro,
                                :bairro,
                                :uf,
                                :cidade,
                                :complemento,
                                :imagem)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':dataNascimento', $dataNascimento);
    $stmt->bindParam(':linguagens', $linguagens);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':uf', $uf);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':imagem', $imagem, PDO::PARAM_LOB);

    $stmt->execute();

    header('location: table.php');
}
