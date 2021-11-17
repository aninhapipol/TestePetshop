<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$animal = $_POST['animal'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$rsenha = $_POST['rsenha'];
$connect = mysqli_connect('localhost','id15361524_root','DogtechBR@2020','id15361524_banco_petshop');
//$db = mysqli_select_db('id15361524_banco_petshop');
$query_select = "SELECT cli_email FROM cliente WHERE cli_email = '$email'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];


  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo email deve ser preenchido');window.location.href='
    Tela_registrar.php';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse email já existe');window.location.href='
        Tela_registrar.php';</script>";
        die();

      }else if($senha !== $rsenha){
        echo"<script language='javascript' type='text/javascript'>
        alert('Senhas não correspondem');window.location.href='
        Tela_registrar.php';</script>";
        die();
          
      }else{
        $query = "INSERT INTO cliente (cli_nome, cli_cpf, cli_nasci, cli_cep, cli_end, cli_cidade, cli_estado, cli_animal, cli_email, cli_senha) VALUES ('$nome','$cpf','$nascimento','$cep','$endereco','$cidade','$estado','$animal','$email','$senha')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='Tela_login.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');</script>";
        }
      }
    }
?>