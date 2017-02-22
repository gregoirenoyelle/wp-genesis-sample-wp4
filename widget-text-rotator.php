<?php 
$output = '';

// Contrôle si le repeater a des champs
if( have_rows('wp_textr_textes', $acfw) ):
	$output .= '<h3 class="rotate">';
	// boucle sur les champs du repeater
		while ( have_rows('wp_textr_textes', $acfw) ) : the_row();
			// affichage des sous-champs
			$texte = get_sub_field('w_textr_texte');
			$output .= sprintf('%s*', $texte);

		endwhile;
	$output .= '</h3>';	
else :
		// pas de champs Repeater
		$output .= 'pas de champ Repeater dans le coin !';

endif;

echo $output;