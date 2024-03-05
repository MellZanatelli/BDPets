<?php
require_once 'init.php';
$nome = isset($_POST['selectNome']) ? $_POST['selectNome'] : null;
$preco = isset($_POST['selectPreco']) ? $_POST['selectPreco'] : null;
$descricao = isset($_POST['selectDescricao']) ? $_POST['selectDescricao'] : null;
$petId = isset($_POST['selectPetId']) ? $_POST['selectPetId'] : null;

if (empty($nome) || empty($preco) || empty($descricao) || empty($petId))
{
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO tipos(descricaoTipo) VALUES(:descricao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>