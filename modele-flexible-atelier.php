<?php
// Template Name: Page Flexible Atelier

// Forcer la plein largeur
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Affichage des champs flexible ACF après le contenu principal
add_action( 'genesis_entry_content', 'builder_atelier', 15 );
function builder_atelier() {
// Variable pour afficher le HTML au final
$output = "";
	// Contrôle si le flexible a des champs
	if( have_rows('pb_bloc') ):
			 // boucle sur les champs du flexible
		while ( have_rows('pb_bloc') ) : the_row();
			if( get_row_layout() == '1_editeur' ):
				// ACF sub_fields
				$output .= '<div class="editeur-1">';
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_1') );
				$output .= '</div>';

			elseif( get_row_layout() == '2_editeurs' ):
				// ACF sub_fields
				$output .= '<div class="editeur-2">';
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_1') );
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_2') );
				$output .= '</div>';

			elseif( get_row_layout() == '3_editeurs' ):
				// ACF sub_fields
				$output .= '<div class="editeur-3">';
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_1') );
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_2') );
				$output .= sprintf( '<div class="editeur">%s</div>', get_sub_field('bloc_3') );
				$output .= '</div>';

			// Fin condition des dispositions	
			endif;
		endwhile;
	else :
			// pas de champs flexible
			$output .= "pas de champ Flexible dans le coin !";
	// fin condition si champs flexible
	endif;

	echo $output;

} // FIN function cuisto_champ_flexible_acf() 

genesis();