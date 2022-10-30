<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estudo CRUD PHP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container my-5">
            <div>
                <h2>Lista de Clientes</h2>
                <a href="/estudo-crud-php/create.php" class="btn btn-primary" role="button">Add Cliente</a>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Criado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "estudo_crud_php";

                        //Criar Conexão
                        $connection = new mysqli($servername, $username, $password, $database);

                        //Checar conexão
                        if($connection->connect_error) {
                            die("Falha na conexão:" . $connection->connection_error);
                        }

                        //Ler todas as linhas da tabela do banco de dados
                        $sql = "SELECT * FROM clients";
                        $result = $connection->query($sql);

                        if(!$result) {
                            die("Consulta inválida:" . $connection->error);
                        }

                        //Ler dados de cada linha
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[phone]</td>
                                    <td>$row[address]</td>
                                    <td>$row[created_at]</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='/estudo-crud-php/edit.php?id=$row[id]'>Editar</a>
                                        <a class='btn btn-danger btn-sm' href='/estudo-crud-php/delete.php?id=$row[id]'>Deletar</a>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>