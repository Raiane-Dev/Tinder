<?php

    class Controller{
        public static function index(){
            $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'home';
            if(file_exists('views/'.$url.'.php')){
                include('views/'.$url.'.php');
            }else{
                die('Essa página não existe');
            }
        }
        public static function deslogar(){
            unset($_SESSION['login']);
            unset($_SESSION['id']);
            unset($_SESSION['nome']);

            session_destroy();
        }
    }

    class Usuarios{
        public static function verificarLogin($login,$senha){
            $verifica = \MySql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `email` = ? AND `senha` = ?");
            $verifica->execute(array($login,$senha));
            $localizacao = \MySql::conectar()->prepare("UPDATE `usuarios` SET `lat_coord` = ?, `long_coord` = ?  WHERE `email` = '$login' AND `senha` = '$senha'");
            $localizacao->execute(array($_POST['lat_coord'],$_POST['long_coord']));

            if($verifica->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public static function startSession($login,$id){
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $id;

            $info = MySql::conectar()->prepare("SELECT id FROM `usuarios` WHERE id = ?");
            $info->execute(array($id));
            $info = $info->fetch();
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['localizacao'] = $info['localizacao'];
            $_SESSION['latitude'] = $info['lat_coord'];
            $_SESSION['longitude'] = $info['long_coord'];
            $_SESSION['sexo'] = $info['sexo'];
        }

        public static function getUserId($email){
            $id = \MySql::conectar()->prepare("SELECT `id` FROM `usuarios` WHERE email = ?");
            $id->execute(array($email));
            $id = $id->fetch()['id'];
            return $id;
        }

        public static function executarAcao($acao,$usuarioId){
            $verifica = MySql::conectar()->prepare("SELECT * FROM likes WHERE user_from = ? AND user_to = ?");
            $verifica->execute(array($_SESSION['id'],$usuarioId));
            if($verifica->rowCount() >= 1){
                return;
            }else{
                $inserirAcao = MySql::conectar()->prepare("INSERT INTO likes VALUES (null,?,?,?)");
                $inserirAcao->execute(array($_SESSION['id'],$usuarioId,$acao));
            }
        }

        public static function pegaUsuarioRandow(){
            if($_SESSION['sexo'] == 'feminino'){
                $pegaUsuarioRandow = MySql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `sexo` = 'masculino'");
                $pegaUsuarioRandow->execute();
                $pegaUsuarioRandow = $pegaUsuarioRandow->fetchAll();
                
            }else if($_SESSION['sexo'] == 'masculino'){
                $pegaUsuarioRandow = MySql::conectar()->prepare("SELECT * FROM `usuarios` WHERE `sexo` == 'feminino'");
                $pegaUsuarioRandow->execute();
                $pegaUsuarioRandow = $pegaUsuarioRandow->fetchAll();
                
            }else{
                $pegaUsuarioRandow = MySql::conectar()->prepare("SELECT * FROM `usuarios`");
                $pegaUsuarioRandow->execute();
                $pegaUsuarioRandow = $pegaUsuarioRandow->fetchAll();
            }
            return $pegaUsuarioRandow;
        }

        public static function pegaCrush(){
            $crushs = array();
            $gostei = MySql::conectar()->prepare("SELECT * FROM likes WHERE user_from = ? AND `action` = 1");
            $gostei->execute(array($_SESSION['id']));
            $gostei = $gostei->fetchAll();
            foreach($gostei as $key => $value){
                $gostaramDeVolta = MySql::conectar()->prepare("SELECT * FROM `likes` WHERE user_to = ? AND user_from = ? AND `action` = 1");
                $gostaramDeVolta->execute(array($_SESSION['id'],$value['user_to']));
                if($gostaramDeVolta->rowCount() == 1){
                    //É crush
                    $infoCrush = MySql::conectar()->prepare("SELECT * FROM `usuarios` WHERE id = ?");
                    $infoCrush->execute(array($value['user_to']));
                    $crushs[] = $infoCrush->fetch();
                }
            }
            return $crushs;

        }
    }

?>