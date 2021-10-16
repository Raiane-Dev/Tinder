<?php
    if(!isset($_SESSION['login'])){
?>
<section class="home">
    <div class="home">
        <div class="head-home">
            <img src="<?php echo INCLUDE_PATH ?>imagens/tinder-logo.png" />
            <h2>Seja bem Vindo!</h2>
            <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
        </div><!--head-home-->
        <div class="content-home">
            <div>
                <h6>Lorem ipsum</h6>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                <h6>Lorem ipsum</h6>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            </div>
            <div>
                <h6>Lorem ipsum</h6>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                <h6>Lorem ipsum</h6>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            </div>
        </div><!--content-home-->
        <a class="button-input" href="<?php echo INCLUDE_PATH ?>login">Continuar</a>
    </div><!--home-->
</section><!--home-->

<?php }else{ ?>
    <div class="swiper-container">
	<div class="swiper-wrapper">
		<?php
            $pegaUsuarioRandow = Usuarios::pegaUsuarioRandow();
            foreach($pegaUsuarioRandow as $key => $value){
            ?>
		<div class="swiper-slide">
			<div class="card">
				<div class="slider-text">
                    <div class="usuario-imagem">
                        <img src="<?php echo $value['imagem'] ?>" />
                    </div><!--usuario-imagem-->
                    <div class="opcoes-usuario">
                    <?php
                        if(isset($_GET['action'])){
                            $action = $_GET['action'];
                            if($action == ACTION_LIKE){
                                Usuarios::executarAcao(ACTION_LIKE,$_GET['id']);
                            }else if($action == ACTION_DISLIKE){
                                Usuarios::executarAcao(ACTION_DISLIKE, $_GET['id']);
                            }
                        }
                    ?>
                    <div>
                        <a href="?action=0&id=<?php echo $value['id']; ?>"><i data-feather="x"></i></a>
                    </div>
                    <div>
                        <a href="?action=1&id=<?php echo $value['id']; ?>"><i data-feather="heart"></i></a>
                    </div>
                    <div>
                        <a href=""><i data-feather="map-pin"></i></a>
                    </div>
                    </div><!--opcoes-usuario-->
                    <div class="info-usuario">
                        <h6><?php echo $value['nome'] ?></h6>
                        <ul>
                            <li> <?php echo $value['sexo'] ?></li>
                        <li>
                        <span style="display:none;" class="lat-user"><?php echo $value['lat_coord']; ?></span>
                        <span style="display:none;" class="long-user"><?php echo $value['long_coord']; ?></span>
                        <p class="user-distancia"><i data-feather="map-pin"></i> </p>
                        </li>
                        </ul>
                    </div><!--info-usuario-->
                </div>
			</div>
		</div>
        <?php } ?>
	
	</div>
</div>
<?php } ?>