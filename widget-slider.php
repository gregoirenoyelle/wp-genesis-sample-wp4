<?php 
// Widget pour slick slider voir fichier
// /wp-content/plugins/wp-slick-slider/gnoyelle-sup-theme.php

$images = get_field('ap_images', $acfw);
// aff_v($images); exit;

if( $images ): ?>
<div class="slider-slick">
    <?php foreach( $images as $image ): 
    $lien = get_field('ap_adresse_sur_limage', $image['ID']);
    $target = get_field('ap_ouvrir_lien_dans_un_nouvel_onglet', $image['ID']);
    if ( $target ) {
    	$target = ' target="_blank"';
    } else {
    	$target = '';
    }
    // aff_v($lien); exit;

    ?>

		<div class="visuel">
			<?php if ( $lien ) { 
					printf('<a href="%s"%s>', $lien, $target );
				} 
			?>
			<img src="<?php echo $image['sizes']['slick-slider']; ?>" width="<?php echo $image['sizes']['slick-slider-width']; ?>" height="<?php echo $image['sizes']['slick-slider-height']; ?>">

			<?php if ( $lien ) {
				echo '</a>';
				} 
			?>
		</div> 
    <?php endforeach; ?>
</div>
<?php endif; ?>