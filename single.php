<?php

// Afficher l'image à la une
add_action( 'genesis_entry_header', 'resto_image_une', 9 );
function resto_image_une() {
	// Regarde si image à la une
	if ( ! 	has_post_thumbnail() ) {
		return;
	}

	// Données de l'image
	$image_id = get_post_thumbnail_id();
	$image_url =  wp_get_attachment_url( $image_id );
	$size = 'large';
	$img = wp_get_attachment_image( $image_id, $size );

	// Afficher l'image 
	printf('<a href="%s">%s</a>', $image_url, $img);


}

genesis();