<?php
    session_start();
    include('config.php');
    include('MySql.php');
    require('Controller.php');

    $controller = new Controller();
    $controllerUsuarios = new Usuarios();


    include('views/modelos/header.php');
    $controller->index();
    include('views/modelos/footer.php');
?>