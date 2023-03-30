<?php

$usuario ="root";
$senha="";
$database="login";
$host="localhost";

$mysqli= new mysqli($host,$usuario,$senha,$database);

if($mysqli->error){
    die("erro ao conectar ao banco". $mysqli->error);
}
?>