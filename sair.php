<?php
session_start();
/* require_once 'conf.php';
require_once 'banco.php';
require_once 'class.php'; */
$user = $_SESSION["user"];

if ((isset($_SESSION['user']))) {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: index.php");
} else {
    header("Location: index.php");
}
    ?>