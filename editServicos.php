<?php

    require_once 'init.php';

    $id = isset($_POST['id']) ? $_POST['id'] : null; //id original está escondido para o usuário e, portanto, não será modificado
    $nome = isset($_POST['selectNome']) ? $_POST['selectNome'] : null;
    $preco = isset($_POST['selectPreco']) ? $_POST['selectPreco'] : null;
    $descricao = isset($_POST['selectDescricao']) ? $_POST['selectDescricao'] : null;
    $petId = isset($_POST['selectPetId']) ? $_POST['selectPetId'] : null;

    // validação (bem simples, só pra evitar dados vazios)
    if (empty($nome) || empty($preco) || empty($descricao) || empty($petId))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE Servicos SET Nome = :nome, Preco = :preco, Descricao = :descricao, PetId = petId WHERE Id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam('petId');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: msgSucesso.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }

?>