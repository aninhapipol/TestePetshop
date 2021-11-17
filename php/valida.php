<?php
session_start();

include_once("conexao.php");
$email = filter_input(INPUT_POST, 'UserEmail', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'UserID', FILTER_SANITIZE_STRING);

$result_usuario = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//Encontrado usuario com esse email
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
    $id= "SELECT id FROM usuarios WHERE email = $email";
    $_SESSION['id'] = $id;
    $resultado = '';
    echo $resultado;
}else{
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $resultado_usuario = mysqli_query($conn, $sql);
    //$resultado = 'Erro';
    //echo(json_encode($resultado));
}
