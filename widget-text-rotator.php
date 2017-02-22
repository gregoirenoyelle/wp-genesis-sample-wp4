<?php 
$output = '';
$i = 1;
// Champ Repeater principal
$textes = get_field('wp_textr_textes', $acfw);
// Compter les éléments du Repeater
$compteur = count($textes);
// aff_v($textes);

// Titre
$titre = get_field('w_textr_titre', $acfw);

if ( $titre ) {
	$output .= sprintf('<h3 class="widgettitle widget-title">%s</h3>', $titre);
}

// Contrôle si le repeater a des champs
if( have_rows('wp_textr_textes', $acfw) ) :
	$output .= '<h3 class="rotate">';
	// boucle sur les champs du repeater
		while ( have_rows('wp_textr_textes', $acfw) ) : the_row();
			// affichage des sous-champs
			if ( $i < $compteur ) {
				$separator = '*';	
			} else {
				$separator = '';
			}
			$texte = get_sub_field('w_textr_texte');
			// $output .= $i;
			$output .= sprintf('%s%s', $texte, $separator);

		// Augmenter la valeur de $i
		$i++;
		endwhile;
	$output .= '</h3>';	
else :
		// pas de champs Repeater
		$output .= 'pas de champ Repeater dans le coin !';

endif;

echo $output;