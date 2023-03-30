<?php

$usuario ="root";
$senha="";
$database="login";
$host="localhost";

$mysqli= new mysqli($host,$usuario,$senha,$database);

if($mysqli->error){
    die("Erro ao conectar ao banco". $mysqli->error);
}
?>