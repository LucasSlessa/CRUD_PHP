<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Novo Registro com Sucesso");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD </title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP CRUD
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Novo Usuario</h3>
            <p class="text-muted">Complete as informacoes abaixo:</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form id="userForm" action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Primeiro Nome:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Helio" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Ultimo Nome:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Espiridiao" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="nome@exemplo.com" required>
                </div>

                <div class="form-group mb-3">
                    <label>Genero:</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                    <label for="male" class="form-input-label">Homen</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" required>
                    <label for="female" class="form-input-label">Mulher</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" id="submitButton" name="submit" disabled>Salvar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- garantia de todos os dados completos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('userForm');
            var submitButton = document.getElementById('submitButton');

            form.addEventListener('change', function() {
                if (form.checkValidity()) {
                    submitButton.removeAttribute('disabled');
                } else {
                    submitButton.setAttribute('disabled', 'true');
                }
            });
        });
    </script>
</body>

</html>
