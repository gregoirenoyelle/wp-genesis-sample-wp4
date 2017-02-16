<?php

// Template Name: Boucle meta

add_action('genesis_entry_content', 'resto_boucle_meta', 15);
function resto_boucle_meta() {

// Ici je sélectionne
// product où color=orange OU color=red et size=small cela donnera:
$args = array(
	'post_type'  => 'cuisinier',
	'order'      => 'ASC',
	'orderby'    => 'menu_order',
	'meta_query' => array(
		'relation'    => 'OR',
		array(
			'key'     => 'gob_age', // Nom du champ ACF
			'value'   => 60, // Valeur du champ dans chaque contenu
			'type'    => 'numeric',
			'compare' => '>=', // Pour age supérieur ou égal à 60
		),
		array(
			'key'     => 'gob_email', // Nom du champ ACF
			'value'   => 'anne-sophie@pic.com', // Valeur du champ dans chaque contenu
			'compare' => '=', 
		),

	),
);
$ma_boucle = new WP_Query( $args );

// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post();
// Variables
$image_id = get_field('gob_photo');
$taille = 'medium';
$img = wp_get_attachment_image( $image_id, $taille );
$lien = get_permalink();
$titre = get_the_title();
// aff_p($image_id); exit;	
	// Affichage de l'image
	printf('<div class="image"><a href="%s">%s</a></div>', $lien, $img);

	// Affichage du titre
	printf('<h3><a href="%s">%s</a></h3>', $lien, $titre );

endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	

} // FIN function resto_boucle_meta() 

genesis();