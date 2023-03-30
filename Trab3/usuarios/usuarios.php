<?php
include("conexao.php");
include("bloqueio.php");

$nome = $_POST['name'];
$email = $_POST['login'];
$senha = $_POST['password'];

if (!isset($_POST['name'])){
	$nome=0;
}
if (!isset($_POST['login'])){
	$email=0;
}
if (!isset($_POST['password'])){
	$senha=0;
}
$emailtratado='"'.$email.'"';
$sqlcheck="SELECT * FROM users WHERE email=$emailtratado";
		$sqlcheck=$mysqli->query($sqlcheck);

if (isset($_POST['password'])){
if(strlen($_POST['password']) <= 5) {
	echo "<sccript>alert('A senha deve ter mais de 6 caracteres')</script>";}
 else if(strlen($_POST['password']) >9) {
	echo "<sccript>alert('A senha deve ter menos de 10 caracteres')</script>";
} 	
elseif($sqlcheck->num_rows >0){
	echo"JÁ EXISTE ESSE EMAIL";
}
	else {
		$result = mysqli_query($mysqli, "INSERT INTO users (nome,email,senha) VALUES ('$nome','$email','$senha')");
		echo "cadastrado com sucesso!";
	}
}

$sqlq="SELECT * FROM users ORDER BY id DESC";
$resultado = $mysqli->query($sqlq);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa9d3a8f9c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="usuarios.css">
    <title>Lista de usuarios</title>
</head>
<body>
    <header>
        <nav>
            <div class="home"><a href="http://localhost/ContasPW2/Trab3/"><i class="fa-solid fa-house"></a></i></div>
            <div class="linkspag">
                <a href="../sobre/sobre.html"><p>Sobre</p></a>
                <a href="http://localhost/ContasPW2/Trab3/servicos/servicos.php"><p>Serviços</p></a>
                <a href="../contato/contato.html"><p>Contato</p></a>
            </div>
            <div class="login">
                <a href="../login/login.php"><button class="btn">Login</button></a>
            </div>
        </nav>
    </header>
    <main>
		<h2>Gerenciar Usuários</h2>

		<div class="users">
			<h3>Usuários Cadastrados</h3>
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Login</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
				<?php
				//$cssclass="class=/'edit-button'";
					while($user_data = mysqli_fetch_assoc($resultado)) {
						 echo "<tr>";
						 echo "<td>".$user_data['id']."</td>";
						 echo "<td>".$user_data['nome']."</td>";
						 echo "<td>".$user_data['email']."</td>";
						 //echo"<td><button>Deletar</button></td>";
						 echo "<td><a href='apagar_usuario.php?id=". $user_data['id'] ."'>Deletar</a></tr>";
						 
					}
					?>
				</tbody>
			</table>
		</div>

		
		<div class="add-user">
			<h3>Editar Nome de Usuário</h3>
			<form action="" method="post">
				<label for="name">ID:</label>
				<input type="text" id="name" name="id">

				<label for="login">Novo Nome:</label>
				<input type="text" id="login" name="newlogin">

				<input type="submit" value="Cadastrar">
			</form>
		</div>
<?php
$sqlid=($_POST['id']);
$sqlogin=($_POST['newlogin']);
//query selecionar id
$sqlquery="SELECT * FROM users WHERE $sqlid=id";
			$verify=$mysqli->query($sqlquery);
//query trocar set nome
$queryupn="UPDATE users SET nome = '$sqlogin' WHERE id = $sqlid";
			$sqlupdaten=$mysqli->query($queryupn);
if($verify->num_rows >0){
		$sqlupdaten;
		header('Location: http://localhost/ContasPW2/Trab3/usuarios/usuarios.php');
}
else{
	echo"<br>usuario nao encontrado";
}
?>
		
	</main>
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