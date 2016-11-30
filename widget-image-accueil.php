<?php

// ID de l'image enregistré dans ACF
$img_id = get_field('acw_image_accueil', $acfw);
// Taille voulue
$taille = 'full';
// Fonction WP pour afficher la balise image
$img = wp_get_attachment_image( $img_id, $taille );
// Variable pour stocker tout le html à afficher
$output = '';
// aff_v($img);

// Affichage de l'image
$output .= '<div class="visuel-accueil">';
$output .= $img;
$output .= '</div>';
echo $output;