<?php
// Widget pour slick slider voir fichier
// /wp-content/plugins/wp-slick-slider/gnoyelle-sup-theme.php

// Variable pour afficher le HTML
$output = '';

// Champ ACF principal pour la galerie. Cela retourne un tableau
// Attention à bien mettre le paramètre $acfw à la fin
$images = get_field('ap_images', $acfw);
// aff_v($images); exit;

// Condition sur la galerie est active. Sinon le script s'arrête.
if( ! $images ) {
    return;
}

//  Div avec la classe Utilisée dans Slick Slider déclarée dans l'extension wp-slick-slider
$output .= '<div class="slider-slick">';

    // Début de la boucle sur le tableau retourné par $images
    foreach( $images as $image ):

        //* Variables dans la boucle
        // ID de l'image
        $id = $image['ID'];
        // Fonction WP pour afficher l'image
        $img = wp_get_attachment_image( $id, 'slick-slider' );
        // Champ ACF de l'image pour l'URL. Attention l'ID est obligatoire
        $lien = get_field('ap_adresse_sur_limage', $id);
        // Champ Vrai Faux dans ACF Pro. Attention l'ID est obligatoire
        $target = get_field('ap_ouvrir_lien_dans_un_nouvel_onglet', $id);

        // Valeur de la variable si la condition est vraie. La case est cochée
        if ( $target ) {
        	$target = ' target="_blank"';
        } else {
        	$target = '';
        }

        // Affichage du visuel avec les options
        $output .= '<div class="visuel">';
            if ( $lien ) {
                // Version avec un lien
                $output .= sprintf('<a href="%s"%s>%s</a>', $lien, $target, $img);
            } else {
                // Version sans lien
                $output .= $img;
            }

        $output .= '</div>';

        // Fin de la boucle
    endforeach;

$output .= '</div><!-- FIN div.slider-slick -->';

echo $output;