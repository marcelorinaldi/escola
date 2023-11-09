<?php
session_start();
require_once 'conf.php';
require_once 'banco.php';
require_once 'class.php';
$db = new banco;
$aluno = new aluno;
$idaluno = $_GET['idaluno'];
$dados = $aluno->listar_um_aluno($idaluno);
$marcelo = $dados->fetch_array();
//print_r($marcelo);
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
            <div class="col-md-12">
            
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

                        <form action="edita.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="gatinho" value="<?=$idaluno?>">
                            <div class="mb-3">
                                <label for="">Nome Aluno</label>
                                <input type="text" name="nome" required class="form-control" value="<?=$marcelo['nome']?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="">Idade</label>
<?php
$data1 = $marcelo['data_nasc'] ;
date_default_timezone_set('America/Sao_Paulo');
$data2  = date("Y-m-d");

$datetime1 = new DateTime($data1);
$datetime2 = new DateTime($data2);
$interval = $datetime1->diff($datetime2);
//$idade = $interval->format('%y anos, %m meses');
echo "<b>";
echo $idade = $interval->format('%y');
echo " anos";
echo "</b>";

?>
                            </div>

                            <div class="mb-3">
                                <label for="">Nascimento</label>
                                <input type="date" name="data" required class="form-control" value="<?=$marcelo['data_nasc']?>" />
                            </div>

                            <?php 
                                if(empty($marcelo['foto'])){                                
                                
                            ?>
                            <div class="mb-3">
                                <label for="">Foto</label>
                                <input type="file" id="fname" name="foto" placeholder="escolha uma imagem...">
                            </div>
                            <?php
                                }else{
                                    ?>
 <div class="mb-3">
                                    <label for="">Excluir Foto?</label>
                                    <input type="radio" id="fname" name="excluir" value="1">Sim
                                    <input type="radio" id="fname" name="excluir" value="2" checked>Não
                                </div>

<?php
                                }
                            ?>

                    </div>
                    <div class="mb-3">
                        <button type="submit" name="edita_aluno" class="btn btn-primary">Atualizar Registro</button>
                    </div>
                    </form>

                    <hr>
                    <center>
                        
                    <?php
                        if (empty($marcelo['foto'])) {
                            echo "sem imagem";
                        } else {
                            echo '<img src="' . $marcelo['foto'] . '" width="50%">';
                        }

                        ?>




                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>