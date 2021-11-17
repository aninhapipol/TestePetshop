<?php
    session_start();
    unset($_SESSION['cli_id']);
    header("location: ../index.php");
?>