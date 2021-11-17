<?php
session_start();
$con= mysqli_connect("localhost","id15361524_root","DogtechBR@2020","id15361524_banco_petshop");
mysqli_select_db($con, "id15361524_banco_petshop");
if(@$_POST['submit'])
{

$file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];

if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400)

if(copy($file_path,'uploads/'.$file_name))
$query = "UPDATE cliente SET cli_foto = '$file_name' WHERE cli_id = $_SESSION[cli_id]";
$result_query = mysqli_query($con, $query);
 
if($query==true)
{
    header("location: Tela_usuario.php");
}
}

?>