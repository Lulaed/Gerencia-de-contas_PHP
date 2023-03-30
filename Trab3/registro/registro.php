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
	//echo "A senha deve ter mais de 6 caracteres";
    echo "<script> alert('A senha deve ter mais de 6 caracteres')</script>";
}
 else if(strlen($_POST['password']) >9) {
	//echo "A senha deve ter menos de 10 caracteres";
    echo "<script> alert('A senha deve ter menos de 10 caracteres')</script>";
} 	
elseif($sqlcheck->num_rows >0){
	//echo"JÁ EXISTE ESSE EMAIL";
    echo "<script> alert('Este email já está em uso')</script>";
    
}
	else {
		$result = mysqli_query($mysqli, "INSERT INTO users (nome,email,senha) VALUES ('$nome','$email','$senha')");
		echo "<script> alert('Cadastrado com sucesso. por favor, realize o login.')</script>";
        header("http://localhost/ContasPW2/Trab3/login/login.html");
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa9d3a8f9c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Registro</title>
</head>
<body>
    <header>
        <nav>
            <div class="home"><a href="http://localhost/ContasPW2/Trab3/"><i class="fa-solid fa-house"></a></i></div>
            <div class="linkspag">
                <a href="../sobre/sobre.html"><p>Sobre</p></a>
                <a href="../login/login.php"><p>Serviços</p></a>
                <a href="../contato/contato.html"><p>Contato</p></a>
            </div>
            <div class="login">
                <a href="../login/login.php"><button class="btn">Login</button></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="register-card-container">
            <div class="register-card">
                <div class="register-card-logo">
                    <img src="../img/logo.svg" alt="logo">
                </div>
                <div class="register-card-header">
                    <h1>Crie sua conta</h1>
                    <div>Preencha os campos abaixo para criar sua conta!</div>
                </div>
                <form class="register-card-form" method='post'>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">person</span>
                        <input type="text" placeholder="Nome Completo" name="name" autofocus required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Email" name="login" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" placeholder="Senha" name="password" required>
                    </div>
                    <a id="anc-login"><button type="submit">Cadastrar</button></a>
                </form>

                <div class="register-card-footer">
                    Já tem uma conta? <a href="../login/login.html" id="page-login">Faça Login aqui.</a>
                </div>
            </div>
        </div>
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