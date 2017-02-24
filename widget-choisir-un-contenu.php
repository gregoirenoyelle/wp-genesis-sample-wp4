<?php

$id = get_field( 'w_contenu_choisi', $acfw	);
// aff_v($id); exit;
$output = '';
$args = array(
	'post_type'  => 'any',
	'p'          => $id

);
$ma_boucle = new WP_Query( $args );

// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post();
	// Taille de l'image
	$taille = 'medium';
	// Image à la une des article ou des pages
	$image_thumbnail = get_the_post_thumbnail('', $taille);
	// Image ACF
	$image_acf = get_field('gob_photo');
	$img = wp_get_attachment_image( $image_acf, $taille );
	// Titre du contenu
	$titre = get_the_title();
	
	if ( $image_thumbnail ) {
		$output .= $image_thumbnail;
	} else {
		$output .= $img;
	}
	$output .= sprintf('<h3>%s</h3>', $titre );

endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	

echo $output;
