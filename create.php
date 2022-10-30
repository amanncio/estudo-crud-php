<?php
    $name = "";
    $email = "";
    $phone = "";
    $address = ""; 

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do {
            if( empty($name) || empty($email) || empty($phone) || empty($address) ) {
                $errorMessage = "Preencha todos os campos!";
                break;
            }

            //Adicionar novo cliente no banco de dados
            $name = "";
            $email = "";
            $phone = "";
            $address = ""; 

            $successMessage = "Cliente adicionado com sucesso!";
        } while (false);

    }
?>
<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estudo CRUD PHP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <div class="container my-5">
                <div>
                    <h2>Novo Cliente</h2>

                    <?php
                        if ( !empty($errorMessage) ) {
                            echo "
                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>$errorMessage</stron>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><button>
                                </div>
                            ";
                        }
                    ?>

                    <form method="post">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Nome</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Telefone</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Endereço</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            </div>
                        </div>
                        
                        <?php
                            if ( !empty($successMessage) ) {
                                echo "
                                    <div class='row mb-3'>
                                        <div class='offset-sm-3 col-sm-6'>
                                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>$successMessage</stron>
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><button>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        ?>  

                        <div class="row mb-3">
                            <div class="offset-sm-3 col-sm-3 d-grid">
                                <button class="btn btn-primary">Criar</button>
                            </div>
                            <div class="col-sm-3 d-grid">
                                <a class="btn btn-danger" href="/estudo-crud-php/index.php" role="button">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>