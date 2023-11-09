<a href="index.php">Cadastro</a>
&nbsp;|&nbsp;
<a href="relatorio.php">Relatório</a>
&nbsp;|&nbsp;
<a href="busca.php">Busca</a>
&nbsp;|&nbsp;
<a href="sair.php">Sair</a>
&nbsp;|&nbsp;
<?php
session_start();
/* require_once 'conf.php';
require_once 'banco.php';
require_once 'class.php'; */

if ((isset($_SESSION['user']))) {
   echo $_SESSION['user'];
} else {
    header("Location: index.php");
}
    ?>

