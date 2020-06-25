<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO usuario (nome, cpf, celular)
    VALUES (:nome, :cpf, :celular)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cnpj);
    $stmt->bindParam(':celular', $celular);

    $nome           = $_POST['nome'];
    $cnpj           = $_POST['cpf'];
    $celular        = $_POST['celular'];

    $stmt->execute();


    echo "Cliente cadastrado com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_clientes.php');
?> 