<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT Id, Nome, Raca, Porte, Especie FROM Pets ORDER BY Nome ASC";
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
                <p class="h3 text-center">Pets Cadastrados</p>
            </div>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Raca</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Especie</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($tipo = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <th scope="row"><?php echo $tipo['id'] ?></th>
                        <td><?php echo $tipo['descricaoTipo'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="form-edit-pets.php?id=<?php echo $tipo['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="deletePets.php?id=<?php echo $tipo['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
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