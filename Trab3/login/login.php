<?php
include("conexao.php");


if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 1) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 1) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../logado/logado.html");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa9d3a8f9c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login</title>
</head>
<body>
    <header>
        <nav>
            <div class="home"><a href="../index.php"><i class="fa-solid fa-house"></a></i></div>
            <div class="linkspag">
                <a href="login.php">Sobre</a>
                <a href="login.php">Serviços</a>
                <a href="login.php">Contato</a>
            </div>
            <div class="login">
                <a href="login.php"><button class="btn">Login</button></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="login-card-container">
            <div class="login-card">
                <div class="login-card-logo">
                    <img src="../img/logo.svg" alt="logo">
                </div>
                <div class="login-card-header">
                    <h1>Login</h1>
                    <div>Por favor entre na conta para utilizar o site!</div>
                </div>
                <form class="login-card-form" method="POST">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="text" placeholder="Email" id="emailForm" name="email" 
                        autofocus required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" placeholder="Senha" id="passwordForm" name="senha"
                         required>
                    </div>
                    <div class="form-item-other">
                        <div class="checkbox">
                            <input type="checkbox" id="rememberMeCheckbox" checked>
                            <label for="rememberMeCheckbox">Manter Login</label>
                        </div>
                        <a href="#">Esqueci minha senha!</a>
                    </div>
                    <button type="submit"><a href="../logado/logado.html">Login</a></button>
                </form>
                <div class="login-card-footer">
                    Não tem uma conta? <a href="../registro/registro.php">Crie sua conta aqui.</a>
                </div>
            </div>
            <div class="login-card-social">
                <div>Outras opções de Login</div>
                <div class="login-card-social-btns">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                        </svg>
                    </a>
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
                    <li><a href="login.php">Sobre nós</a></li>
                    <li><a href="login.php">Nossos serviços</a></li>
                    <li><a href="login.php">Entre em contato</a></li>
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