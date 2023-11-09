<?php
session_start();
require_once 'conf.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .ficagrande {

            transition: transform 1.5s;

        }

        .ficagrande:hover {

            transform: scale(29.5);

        }
    </style>

</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['sms'])) {
                    echo $_SESSION['sms'];
                    unset($_SESSION['sms']);
                }
                ?>
                <div class="card">
                <div class="card-header">
                        <?php require_once 'menu.php'?>                       
                    </div>
                    <div class="card-body">

                        <h1>Página Inicial</h1>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>