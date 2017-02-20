<?php

// Template Name: Flexible Recette

// Forcer la plein largeur
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Affichage des champs flexible ACF après le contenu principal
add_action( 'genesis_entry_content', 'cuisto_champ_flexible_acf', 15 );
function cuisto_champ_flexible_acf() {
// Variable pour afficher le HTML au final
$output = "";
	// Contrôle si le flexible a des champs
	if( have_rows('recet_contenu_flexibles') ):
			 // boucle sur les champs du flexible
		while ( have_rows('recet_contenu_flexibles') ) : the_row();
			if( get_row_layout() == 'recet_titre_recette' ):
				// ACF sub_fields
				$output .= sprintf( '<h3>%s</h3>', get_sub_field('recet_titre') );

			elseif( get_row_layout() == 'recet_description' ):
				// ACF sub_fields
				$output .= sprintf( '<div class="description">%s</div>', get_sub_field('recet_editeur') );

			elseif( get_row_layout() == 'recet_visuel' ):
				// ACF sub_fields
				$image_id = get_sub_field('recet_image');
				$image_url =  wp_get_attachment_url( $image_id );
				$taille = get_sub_field('recet_taille_de_limage');
				$img = wp_get_attachment_image( $image_id, $taille );

				$output .= sprintf( '<div class="visuel"><a href="%s">%s</a></div>', $image_url, $img );

			elseif( get_row_layout() == 'recet_liste_ingredients' ):	
				// ACF sub_fields
				if ( have_rows('recet_ingredients') ) :  
					$output .= '<ul class="ingredients">';
					while ( have_rows('recet_ingredients') ) : the_row();
						$output .= sprintf('<li>%s</li>', get_sub_field( 'recet_ingredient') );
					endwhile;
					$output .= '</ul>';
				else : 
					$output .= "Merci d'ajouter des ingrédients";
				// Fin condition si ingrédients
				endif;	

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