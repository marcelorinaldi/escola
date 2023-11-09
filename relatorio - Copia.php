<?php
        session_start();
        require_once 'conf.php';
        require_once 'banco.php';
        require_once 'class.php';

        $db = new banco;

        ?> 
<!DOCTYPE html>
<html lang="en">

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
        <?php
                if(isset($_SESSION['sms'])){
                    echo $_SESSION['sms'];
                     unset($_SESSION['sms']);
                }
                ?>
                <div class="card">
                  
                <div class="card-header">
                        <?php require_once 'menu.php';?>                       
                    </div>
                    <div class="card-body">
                    
                    <center>
                        <table border="1" width="100%">
                            <tr>
                                <th> ID ALUNO </th>
                                <th> NOME ALUNO </th>
                                <th> NASCIMENTO </th>
                                <th width="20%"> FOTO </th>
                                <th> - </th>
                            </tr>

                           

                            <?php
                                $aluno = new aluno;
                                $result = $aluno->listar_alunos();
                            while ($linha = $result->fetch_array()) {
                            ?>
                                <tr>
                                    <td><?= $linha['idaluno'] ?></td>
                                    <td><?= $linha['nome'] ?> </td>
                                    <td><?= $linha['data_nasc'] ?> </td>
                                    <td>                                   
                                    <?php
                                        if(empty($linha['foto'] )){
                                            echo "sem imagem";
                                        }else{
                                            echo '<img class="ficagrande" src="'.$linha['foto'].'" width="10%">';
                                        }

                                    ?>
                                     </td>
                                    <td><a href="aluno_apaga.php?idaluno=<?= $linha['idaluno'] ?>&nome=<?= $linha['nome'] ?>"> [X]</a>
                                        &nbsp;|&nbsp;
                                        <a href="aluno_form_edita.php?idaluno=<?= $linha['idaluno'] ?>"> [0]</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>



                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>