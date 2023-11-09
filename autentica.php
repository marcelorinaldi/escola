<?php
/* echo "<pre>";
print_r($_POST); */

session_start();

require_once 'banco.php';
require_once 'class.php';

$db = new banco;

if (isset($_POST['autentica'])) {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $teste = [
        'login' => mysqli_real_escape_string($db->conn, $login),
        'senha' => mysqli_real_escape_string($db->conn, $senha)
    ];

    $valida = new autentica;
    $resultado = $valida->valida($teste);

    if ($resultado == 1) {
        $_SESSION['sms'] = "Bem vindo(a) a turma: &nbsp;" . $login;
        $_SESSION['user'] = $login;
        header('location: home.php');
    } else {
        $_SESSION['sms'] = "Falha no login!";
        header('location: index.php');
    }
} else {
    $_SESSION['sms'] = "erro";
    header('Location: index.php');
}
