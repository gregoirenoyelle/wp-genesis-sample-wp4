<?php
// Variables en dehors de la boucle
$output = "";
$images = get_field('w_slick_visuels', $acfw);
// aff_p($images);

// Si pas d'image, le script s'arrête
if ( ! $images ) {
	return;
}

// Balise en relation avec l'appel jQuery sur la classe .widget-slider-slick
// déclaré dans l'extension /plugins/wp4-slick-slider/lib/func.wordpress.php
$output .= '<div class="widget-slider-slick">';

	// Début de la boucle
	foreach ( $images as $image ) :
		// Variable dans la boucle
		$id = $image['id'];
		$url = $image['sizes']['slick-slider']; 
		$width = $image['sizes']['slick-slider-width'];
		$height = $image['sizes']['slick-slider-height'];
		// Récupérer le champ ACF ajouté dans les médias
		/*
			Je dois spécifier l'ID du contenu car ce champ ACF média
			n'est pas compris dans le tableau PHP $images
		*/
		$titre = get_field('med_titre_image', $id);
		$color = get_field('med_couleur_titre', $id);
		$lien = get_field('med_lien_image', $id);
		$output .= '<div class="visuel">';
			// Condition si un lien existes
			if ( $lien ) {
				$output .= sprintf('<a href="%s">', $lien);
			}
				$output .= sprintf('<img src="%s" width="%s" height="%s">', $url, $width, $height );
			if ( $lien ) {
				$output .= '</a>';
			}
			if ( $titre ) {
				$output .= sprintf( '<h2 class="titre-slider" style="color:%s;">%s</h2>', $color, $titre );
			}
		$output .= '</div>';
	endforeach;
	// Fin de la boucle

$output .= '</div>';

// Affichage du HTML
echo $output;

