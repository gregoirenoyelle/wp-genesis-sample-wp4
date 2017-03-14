<?php

// ID de l'image enregistré dans ACF
$img_id = get_field('acw_image_accueil', $acfw);
// Fonction WP pour afficher la balise image
$img = wp_get_attachment_image( $img_id, 'full');
// Variable pour le lien sur l'image
$lien = get_field('acw_lien_image', $acfw);
// Variable pour stocker tout le html à afficher
$output = '';
// aff_v($lien);

// Affichage de l'image
$output .= '<div class="visuel-accueil">';
	// Condition si le lien existe
	if ( $lien ) {
	    $output .= sprintf('<a href="%s">%s</a>', $lien, $img );
	} else {
	    $output .= $img;
	}
$output .= '</div>';
// Affichage de tout le HTML contenu dans la variable $output
echo $output;