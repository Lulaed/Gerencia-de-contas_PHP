<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa9d3a8f9c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="incial.css" type="text/css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <nav>
            <div class="home"><a href="http://localhost/ContasPW2/Trab3/"><i class="fa-solid fa-house"></a></i></div>
            <div class="linkspag">
                <a href="login/login.php">Sobre</a>
                <a href="login/login.php">Serviços</a>
                <a href="login/login.php">Contato</a>
            </div>
            <div class="login">
                <a href="login/login.php"><button class="btn">Login</button></a>
            </div>
        </nav>
    </header>
    <main>
        <section class="banner">
            <img src="img/banner.svg" alt="Banner da empresa">
            <div class="banner-text">
                <h1>Bem-vindo à nossa empresa de gerência</h1>
                <p>Ajudamos a gerenciar suas finanças e projetos de forma eficiente</p>
                <a href="login/login.php"><button class="btn-primary">Saiba mais</button></a>
            </div>
        </section>
        <section class="destaques">
            <h2>Nossos destaques</h2>
            <div class="destaque-card">
                <img src="img/destaque1.svg" alt="Destaque 1">
                <div class="destaque-text">
                    <h3>Gerenciamento de projetos</h3>
                    <p>Gerenciamos seus projetos de forma eficiente e organizada, desde o planejamento até a execução.</p>
                </div>
            </div>
            <div class="destaque-card">
                <img src="img/destaque2.svg" alt="Destaque 2">
                <div class="destaque-text">
                    <h3>Consultoria financeira</h3>
                    <p>Oferecemos consultoria financeira para ajudá-lo a tomar as melhores decisões em relação ao seu dinheiro.</p>
                </div>
            </div>
            <div class="destaque-card">
                <img src="img/destaque3.png" alt="Destaque 3">
                <div class="destaque-text">
                    <h3>Análise de dados</h3>
                    <p>Analisamos seus dados financeiros e de projetos para fornecer insights valiosos que podem ajudá-lo a melhorar seus resultados.</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <div class="logo">
                <img src="/img/logo.svg" alt="Logo da empresa">
                <p>Nossa empresa de gerência está comprometida em ajudá-lo a ter sucesso</p>
            </div>
            <div class="footer-links">
                <h3>Links úteis</h3>
                <ul>
                    <li><a href="login/login.php">Sobre nós</a></li>
                    <li><a href="login/login.php">Nossos serviços</a></li>
                    <li><a href="login/login.php">Entre em contato</a></li>
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