<!DOCTYPE html>
<html>
<head>
    <title>Tinder</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
</head>
<body>
<?php
    if(isset($_GET['deslogar'])){
        Controller::deslogar();
    }
?>
<section class="conteudo-geral">
    <div class="conteudo-geral">
<header>
    <div class="header">
        <div>
            <span class="menuAside"><i data-feather="menu"></i></span>
        </div>
        <div>
            <h2>Tinder</h2>
        </div>
        <div>
            <a href="<?php echo INCLUDE_PATH ?>?deslogar"><i data-feather="log-out"></i></a>
        </div>
    </div><!--header-->
</header>
<aside class="aside hide">
    <div class="menu">
        <nav>
            <ul>
            <span class="menuAside"><i data-feather="x"></i></span>
                <li><a href="<?php echo INCLUDE_PATH ?>"><i data-feather="home"></i> Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH ?>crushs"><i data-feather="heart"></i> Crushs</a></li>
                <li><a href="<?php echo INCLUDE_PATH ?>"><i data-feather="message-circle"></i> Chat</a></li>
                <li><a href="<?php echo INCLUDE_PATH ?>"><i data-feather="user"></i> Perfil</a></li>
                <li><a href="<?php echo INCLUDE_PATH ?>"><i data-feather="file-text"></i> Política de Privacidade</a></li>
                <li><a href="<?php echo INCLUDE_PATH ?>?deslogar"><i data-feather="log-out"></i> Sair</a></li>
            </ul>
        </nav>
    </div><!--menu-->
</aside>