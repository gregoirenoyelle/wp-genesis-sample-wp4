<?php 
// Widget pour slick slider voir fichier
// /wp-content/plugins/wp-slick-slider/gnoyelle-sup-theme.php

// Champ principal pour la galerie. Cela retourne un tableau
// Attention à bien mettre le paramètre $acfw à la fin
$images = get_field('ap_images', $acfw);
// aff_v($images); exit;

// Condition sur la galerie est active
if( $images ): ?>

<!-- Div avec la classe Utilisée dans Slick Slider déclarée dans l'extension wp-slick-slider-->
<div class="slider-slick">
    <?php 
    // Début de la boucle sur le tableau retourné par $images
    foreach( $images as $image ): 
      
        // Variables pour récupérer les champs d'image ajouté avec ACF
        // Comme je suis en dehors de la boucle, je dois mettre l'ID de chaque image
        // qui est disponible dans le tableau la clé ID
        
        // Champ URL dans ACF Pro
        $lien = get_field('ap_adresse_sur_limage', $image['ID']);
        // Champ Vrai Faux dans ACF Pro
        $target = get_field('ap_ouvrir_lien_dans_un_nouvel_onglet', $image['ID']);
        // Valeur de la variable si la condition est vraie. La case est cochée
        if ( $target ) {
        	$target = ' target="_blank"';
        } else {
        	$target = '';
        }

    ?>
        
		<div class="visuel">
			<?php 
			    // Condition si j'ai un lien
			    // L'image est clickable
			    if ( $lien ) { 
					printf('<a href="%s"%s>', $lien, $target );
				} 
				
				// Affichage de l'image avec les données du tableau
			?>
			<img src="<?php echo $image['sizes']['slick-slider']; ?>" width="<?php echo $image['sizes']['slick-slider-width']; ?>" height="<?php echo $image['sizes']['slick-slider-height']; ?>">

			<?php if ( $lien ) {
				echo '</a>';
				} 
			?>
		</div> 
    <?php 
        // Fin de la boucle sur le tableau $images
        endforeach; 
     ?>
</div>
<?php 
    // Fin de la condition si la galerie existe
    endif; 
?>