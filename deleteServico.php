<?php

require_once 'init.php';

$id = isset($_GET['id']) ? $_GET['id'] : null; // 'id' corresponde a chave primária no formulário
if (empty($id))
{
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql = "DELETE FROM Servicos WHERE Id = :id";
$stmt = $PDO->prepare($sql); //prepare: prepara o código em sql para ser executado no banco de dados
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: msgSucesso.html'); //mensagem com formatação
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}
?>