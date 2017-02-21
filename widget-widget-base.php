<?php

// Titre du widget
$titre_widget = get_field('w_base_titre', $acfw);
if ( $titre_widget ) {
	printf('<h3 class="widgettitle widget-title">%s</h3>', $titre_widget);
}

// Vidéo
$video = get_field('w_video', $acfw);
if ( $video ) {
	printf( '<div class="video-widget">%s</div>', $video );
}



// Contrôle si le repeater a des champs
if( have_rows('w_base_ingredients', $acfw) ):
	echo "<ul>";
	// boucle sur les champs du repeater
		while ( have_rows('w_base_ingredients', $acfw) ) : the_row();
			// affichage des sous-champs
			printf( '<li>%s</li>', get_sub_field('w_base_ingredient', $acfw) );
		endwhile;
else :
		// pas de champs Repeater
		echo "pas de champ Repeater dans le coin !";
	echo "</ul>";
endif;