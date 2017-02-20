<?php
// Template Name: Repeater ACF

// Affichage du repeater après le contenu principal
add_action( 'genesis_entry_content', 'resto_contenu_repeater', 15 );
function resto_contenu_repeater() {

// Contrôle si le repeater a des champs
if( have_rows('recet_ingredients') ):
	echo "<ul>";
	// boucle sur les champs du repeater
		while ( have_rows('recet_ingredients') ) : the_row();
			// affichage des sous-champs
			printf( '<li>%s</li>', get_sub_field('recet_ingredient') );
		endwhile;
else :
		// pas de champs Repeater
		echo "pas de champ Repeater dans le coin !";
	echo "</ul>";
endif;




} // FIN function resto_contenu_repeater() 



genesis();