<?php
require_once 'init.php';
// pega os dados do formuário

$nome = isset($_POST['selectNome']) ? $_POST['selectNome'] : null;
$raca = isset($_POST['selectRaca']) ? $_POST['selectRaca'] : null;
$porte = isset($_POST['selectPorte']) ? $_POST['selectPorte'] : null;
$especie = isset($_POST['selectEspecie']) ? $_POST['selectEspecie'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($pets_id) || empty($raca) || empty($porte) || empty($especie))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO Pets(Nome, Raca, Porte, Especie) VALUES(:nome, :raca, :porte, :especie)";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':raca', $raca);
$stmt->bindParam(':porte', $porte);
$stmt->bindParam(':especie', $especie);

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