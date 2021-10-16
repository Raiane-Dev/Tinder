<div class="crushs-container">
	<div class="crushs-boxes">

		<?php
            $crushs = Usuarios::pegaCrush();
            foreach($crushs as $key => $value){
        ?>
            <div class="crush-single">
                <img src="<?php echo $value['imagem'] ?>" />
                <div><h6><?php echo $value['nome'] ?></h6>
                <p><i data-feather="map-pin"></i> <?php echo $value['localizacao'] ?></p></div>
            </div><!--crush-single-->
        <?php } ?>
	
	</div><!--crushs-boxes-->
</div><!--crushs-container-->
