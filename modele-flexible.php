<?php
// Template Name: Page avec Flexible

// Ajout du contenu flexible après le contenu principal
add_action( 'genesis_entry_content', 'ap_repeater_content', 50);
function ap_repeater_content() {

$output = '';

	// Contrôle si le flexible a des champs
	if( have_rows('ap_contenu_flexible') ):
		 // boucle sur les champs du flexible
		while ( have_rows('ap_contenu_flexible') ) : the_row();

			if( get_row_layout() == 'ap_recette_en_pdf' ):

				$output .= sprintf( '<h4><a href="%s">%s</a></h4>', get_sub_field('ap_fichier_pdf'), get_sub_field('ap_titre_du_pdf') );

			elseif( get_row_layout() == 'ap_video' ):
				
				$output .= sprintf( '<h4>%s</h4>', get_sub_field('ap_titre_de_la_video') );
				$output .= sprintf( '<div class="video">%s</div>' , get_sub_field('ap_video_en_ligne') );

			endif;

		endwhile;

	else :
		// pas de champs flexible
		$output .= 'pas de champs Flexible dans le coin !';
	endif;

echo $output;	

} // function gn_flexible_content()
genesis();