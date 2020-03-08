<?php
session_start();

if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <form method="POST" action="../../controllers/userController.php?event=login">
            <?php
            if (isset($_GET['error']) && !empty($_GET['error'])) {

                if ($_GET['error'] == 'true') {
                    echo "<div class='form-row'>
                        <div class='col'>
                            <div class='alert alert-danger'>Email Ou mot de passe ghaltin !</div>
                        </div>
                    </div>";
                }else if($_GET['error'] == 'notallowed'){
                    echo "<div class='form-row'>
                    <div class='col'>
                        <div class='alert alert-danger'>Connecti yehdik w yarhem bouk !</div>
                    </div>
                </div>";  
                }else if ($_GET['error'] == 'false') {
                    echo "<div class='form-row'>
                    <div class='col'>
                        <div class='alert alert-info'>Bye bye !</div>
                    </div>
                </div>";  
                }
            } ?>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="Connexion" class="btn btn-primary">
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>