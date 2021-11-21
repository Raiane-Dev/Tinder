<?php
    define('INCLUDE_PATH','http://localhost/Tinder/');

    define('HOST','localhost');
    define('DATABASE','tinder');
    define('USER','root');
    define('PASSWORD','');
    define('ACTION_LIKE','1');
    define('ACTION_DISLIKE','0');

    $autoload = function($class){
        include($class.'.php');
    };

    spl_autoload_register($autoload);

?>
