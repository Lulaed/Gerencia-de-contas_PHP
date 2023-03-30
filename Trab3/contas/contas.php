<?php
include("conexao.php");
include("bloqueio.php");
//variaveis add
$titulo=$_POST['titulo'];
$valor=$_POST['valor'];
$data=$_POST['data'];
print_r($titulo);
print_r($valor);
print_r($data);
//contas pagas show query
$sqlq="SELECT * FROM contaspagas ORDER BY id DESC";
$resultado = $mysqli->query($sqlq);
//contas a pagar show query
$sqlqn="SELECT * FROM contaspagar ORDER BY id DESC";
$result = $mysqli->query($sqlqn);
//query cadastrar contas

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/fa9d3a8f9c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="contas.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
  <title>Contas</title>
</head>

<body>
  <header>
    <nav>
      <div class="home"><a href="../index.html"><i class="fa-solid fa-house"></a></i></div>
      <div class="linkspag">
        <a href="../sobre/sobre.html">
          <p>Sobre</p>
        </a>
        <a href="../servicos/servicos.html">
          <p>Serviços</p>
        </a>
        <a href="../contato/contato.html">
          <p>Contato</p>
        </a>
      </div>
      <div class="login">
        <a href="../login/login.html"><button class="btn">Login</button></a>
      </div>
    </nav>
  </header>
  <main>
    <br>
    <div class="container">
      <h1>Serviços da Loja</h1>


      <h2>Contas a pagar</h2>
      <table id="not-paid-list">
        <thead>
          <tr>
            <th>ID</th>
            <th>Conta</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody class="not-paid">
        <?php
				//$cssclass="class=/'edit-button'";
					while($user_data = mysqli_fetch_assoc($result)) {
						 echo "<tr>";
						 echo "<td>".$user_data['id']."</td>";
						 echo "<td>".$user_data['titulo']."</td>";
						 echo "<td>R$ ".$user_data['valor']."</td>";
						 //echo"<td><button>Deletar</button></td>";
						 echo "<td><a href='apagar_usuario2.php?id=". $user_data['id'] ."'>Deletar</a></tr>";
						 
					}
					?>
        </tbody>
      </table>
      <h2>Contas pagas</h2>
      <table id="paid-list">
        <thead>
          <tr>
            <th>ID</th>
            <th>Conta</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody class="paid">
        <?php
				//$cssclass="class=/'edit-button'";
					while($user_data = mysqli_fetch_assoc($resultado)) {
						 echo "<tr>";
						 echo "<td>".$user_data['id']."</td>";
						 echo "<td>".$user_data['titulo']."</td>";
						 echo "<td> R$".$user_data['valor']."</td>";
						 //echo"<td><button>Deletar</button></td>";
						 echo "<td><a href='apagar_usuario.php?id=". $user_data['id'] ."'>Deletar</a></tr>";
						 
					}
					?>
        </tbody>
      </table>
      <h2>Cadastrar nova conta</h2>
      <form class="add-conta" method="POST">
        <label for="title">Título:</label>
        <input type="text" id="title" name="titulo">
        <br>
        <label for="value">Valor:</label>
        <input type="text" id="value" name="valor">
        <br>
        <label for="due-date">Data de vencimento:</label>
        <input type="text" id="due-date" name="data">
        <br>
        <button type="submit">Cadastrar</button>
      
      <?php
      if($titulo >0){
        $sqliinsert="INSERT INTO contaspagar (titulo,valor,ata) VALUES ('$titulo','$valor','$data')";
        $insert= $mysqli->query($sqliinsert);
        header("Location:http://localhost/ContasPW2/Trab3/contas/contas.php");
      }
       
      ?>


      </form>
      <h2>Editar conta</h2>
      <form class="edit-conta" method="post">
        <label for="title-edit">ID:</label>
        <input type="text" id="title-edit" name="edit_id">
        <br>
        <label for="due-date-edit">Novo titulo:</label>
        <input type="text" id="due-date-edit" name="edit_titulo">
        <br>
        <button type="submit">Salvar</button>
      </form>
      <?php
$edit_id=($_POST['edit_id']);
$edit_titulo=($_POST['edit_titulo']);
//query selecionar contas pagas
$sqlquery="SELECT * FROM contaspagas WHERE $edit_id=id";
			$selectid1=$mysqli->query($sqlquery);
//query selecionar contas a pagar
$sqlquery2="SELECT * FROM contaspagar WHERE $edit_id=id";
$selectid2=$mysqli->query($sqlquery2);

//query trocar contas a pagar
$queryup1="UPDATE contaspagar SET titulo = '$edit_titulo' WHERE id = $edit_id";
			$update1=$mysqli->query($queryup1);

//query trocar contas pagas
  $queryup2="UPDATE contaspagas SET titulo = '$edit_titulo' WHERE id = $edit_id";
	$update2=$mysqli->query($queryup2);

if($sqlquery->num_rows >0){
		$update1;
		//header('Location: http://localhost/ContasPW2/Trab3/usuarios/usuarios.php');
}
if($sqlquery2->num_rows >0){
  $update2;
}

else{
	echo"<br>usuario nao encontrado";
}
?>
     

  <?php
  $idpay=$_POST['idpay'];
  $pay=$_POST['pay'];

  $sqlselectconta="SELECT * FROM contaspagar WHERE id=$idpay";
  $selectconta = $mysqli->query($sqlselectconta);

  $sqlselectcontavalor="SELECT * FROM contaspagar WHERE valor=$pay";
  $selectcontavalor = $mysqli->query($sqlselectcontavalor);
  print_r($selectcontavalor);
  $conta_data=mysqli_fetch_assoc($selectconta);
  if($selectconta ->num_rows >0 and $selectcontavalor ->num_rows >0){
  $newcontatitulo = $conta_data['titulo'];
  $newcontavalor = $conta_data['valor'];
  $newcontadata = $conta_data['ata'];

  $sqliinsertnewconta="INSERT INTO contaspagas (titulo,valor,ata) VALUES ('$newcontatitulo','$newcontavalor','$newcontadata')";
  $insertnewconta= $mysqli->query($sqliinsertnewconta);

  $sqldeletenewconta="DELETE FROM contaspagar WHERE id=$idpay";
  $deletenewconta= $mysqli->query($sqldeletenewconta);
  
  }
  else{
    echo "conta não encontrada ou valor inserido incorretamente";
  }


  print_r($newcontatitulo);
  print_r($newcontavalor);
  print_r($newcontadata);
  
  ?>
  <footer>
    <div class="footer-content">
      <div class="logo">
        <img src="../img/logo.svg" alt="Logo da empresa">
        <p>Nossa empresa de gerência está comprometida em ajudá-lo a ter sucesso</p>
      </div>
      <div class="footer-links">
        <h3>Links úteis</h3>
        <ul>
          <li><a href="../sobre/sobre.html">Sobre nós</a></li>
          <li><a href="../servicos/servicos.html">Nossos serviços</a></li>
          <li><a href="../contato/contato.html">Entre em contato</a></li>
        </ul>
      </div>
      <div class="footer-contato">
        <h3>Entre em contato</h3>
        <ul>
          <li><i class="fa-solid fa-phone"></i> (11) 1234-5678</li>
          <li><i class="fa-solid fa-envelope"></i> contato@empresadegerencia.com.br</li>
          <li><i class="fa-solid fa-location-dot"></i> Rua da Gerência, 123 - São Paulo/SP</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2023 Empresa de Gerência. Todos os direitos reservados.</p>
    </div>
  </footer>
</body>

</html>