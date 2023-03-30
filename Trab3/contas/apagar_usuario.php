<?php
include("conexao.php");
$id= $_GET['id'];
filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$result_usuario="DELETE FROM contaspagas WHERE id=$id";
$resultado_usuario=mysqli_query($mysqli,$result_usuario);
$resultado_usuario;
header("Location:/ContasPW2/Trab3/contas/contas.php")
//header(location:'localhost//ContasPW2/Trab3/usuarios/usuarios.php');


//$result = mysqli_query($mysqli, "INSERT INTO users (nome,email,senha) VALUES ('$nome','$email','$senha')");)
?>