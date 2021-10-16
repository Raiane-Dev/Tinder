<?php
    if(isset($_SESSION['login'])){
        header('Location: '.INCLUDE_PATH.'home');
    }
    if(isset($_POST['acao'])){
        if(Usuarios::verificarLogin($_POST['login'],$_POST['senha'])){
            $getId = Usuarios::getUserId($_POST['login']);
            Usuarios::startSession($_POST['login'],$getId); //Criaremos uma session para o usuário logado
            header('Location: '.INCLUDE_PATH);
        }else{
            echo '<script> alert("Usuário Inválido"); </script>';
        }
    }

?>

<section class="acessar">
    <div class="acessar">
        <div class="head-acessar">
            <img src="https://brandlogos.net/wp-content/uploads/2021/09/tinder-flame-logo.png"/>
        </div><!--head-acessar-->
        <div class="content-acessar">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            <a class="button" href="?logar"><i data-feather="log-in"></i> Logar com uma conta</a>
            <a class="button" href="?cadastrar"><i data-feather="external-link"></i> Cadastrar um novo usuário</a>
        </div><!--content-acessar-->
    </div><!--acessar-->
</section><!--acessar-->

<?php
    if(isset($_GET['logar'])){
    echo '<style>section.acessar{display:none;}</style>'; //Mudando Estilo.
?>
<section class="form-acesso">
    <div class="form-acesso">
        <div class="form-head">
            <img src="<?php echo INCLUDE_PATH ?>imagens/tinder-logo.png" />
            <h2>Seja bem vindo!</h2>
        </div><!--form-head-->
        <div class="form-login">
            <form method="post">
                <input name="login" type="email" placeholder="Escreva seu Email" />

                <input name="senha" type="password" placeholder="Sua Senha" />

                <input type="hidden" class="lat" name="lat_coord" />
                <input type="hidden" class="long" name="long_coord" />

                <input name="acao" type="submit" value="Logar" />
            </form>
        </div><!--form-login-->
    </div><!--form-acesso-->
</div><!--form-acesso-->
<?php } ?>

<script>

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }else{
        x.innerHTML = "Geolocalização não suportada em seu navegador";
    }
    function showPosition(position){
        $('input[name="lat_coord"]').val(position.coords.latitude);
        $('input[name="long_coord"]').val(position.coords.longitude);
    }
</script>