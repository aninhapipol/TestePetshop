<?php
session_start();
if (isset($_SESSION['cli_id'])) {
    header("location: Tela_usuario.php");
}if(!isset($_SESSION['cli_id'])){
    header("location: Tela_login.php");
    exit;
}
?>