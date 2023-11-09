<?php
session_start();
include('banco.php');
include('class.php');
$db = new banco;

print_r($_GET);


$id = $_GET['idaluno'];
$nome = $_GET['nome'];
$acao = 1;

$aluno = new aluno;
$comando = $aluno->excluir_aluno($id,$acao);

print_r($comando);
if ($comando > 0) {
    $texto = "<span style='color:red'> ".$nome."</span>";
    $_SESSION['sms'] = "Adeus ".$texto;
    header("Location: relatorio.php");
    exit(0);
} else {
    $_SESSION['sms'] = "Tu ta tentando acessar direto =)";
    header("Location: relatorio.php");
    exit(0);
} 
?>