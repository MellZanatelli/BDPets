<?php
    require 'init.php';
    $PDO = db_connect();

    $sql = "SELECT Sv.Id, Sv.Nome, Sv.Preco, Sv.Descricao, Pt.Nome FROM Servicos as Sv inner join Pets as Pt on Sv.PetsId = Pt.Id";
    
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
            <div id="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
                <p class="h3 text-center">Serviços Realizados</p>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pet</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php while ($servicos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row"><?php echo $servicos['Id'] ?></th>
                    <td><?php echo $servicos['Sv.Nome'] ?></td>
                    <td><?php echo $servicos['Preco'] ?></td>
                    <td><?php echo $servicos['Descricao'] ?></td>
                    <td><?php echo $servicos['Pt.Nome'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="form-edit-servicos.php?id=<?php echo $servicos['Id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="deleteServicos.php?id=<?php echo $servicos['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    <div class="container">
        <div class="card-footer">
            <p>Todos os direitos reservados a &copy;Mell</p>
        </div>
    </div>
</body>
</html>