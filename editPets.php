<?php
    require_once 'init.php';

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['selectNome']) ? $_POST['selectNome'] : null;
    $raca = isset($_POST['selectRaca']) ? $_POST['selectRaca'] : null;
    $porte = isset($_POST['selectPorte']) ? $_POST['selectPorte'] : null;
    $especie = isset($_POST['selectEspecie']) ? $_POST['selectEspecie'] : null;

    if (empty($nome) || empty($pets_id) || empty($raca) || empty($porte) || empty($especie))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE Pets SET Nome = :nome, Raca = :raca, Porte = :porte, Especie = :especie WHERE Id = :id";
    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':raca', $raca);
    $stmt->bindParam(':porte', $porte);
    $stmt->bindParam(':especie', $especie);

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