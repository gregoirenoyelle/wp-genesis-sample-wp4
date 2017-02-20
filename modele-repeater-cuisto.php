<?php 
// Template Name: Repeater Cuisinier

// Affichage du repeater après le contenu principal
add_action( 'genesis_entry_content', 'resto_contenu_cuisinier_repeater', 15 );
function resto_contenu_cuisinier_repeater() {
// Variable HTML à l'extérieur de la boucle
$output = "";

// Contrôle si le repeater a des champs
if( have_rows('champ_fiche_cuisinier') ):
	// boucle sur les champs du repeater
		while ( have_rows('champ_fiche_cuisinier') ) : the_row();

		// Variables basiques dans la boucle
		$nom = get_sub_field('souschamp_nom_cuisinier');
		$age = get_sub_field('souschamp_age_cuisinier');
		$sexe = get_sub_field('souschamp_sexe_cuisinier');
		$lien = get_sub_field('souschamp_lien_cuisinier');

		// Variables de l'image
		// Récupérer l'ID de l'image
		$image_id = get_sub_field('souschamp_photo_cuisinier');
		$taille = 'thumbnail';
		// Utilisation de la fonction pour afficher la balise img
		$img = wp_get_attachment_image( $image_id, $taille );

		// Affichage du HTML dans la boucle
		// Titre du cuisinier
		$output .= sprintf('<h3><a href="%s">%s</a></h3>', $lien, $nom );
		// Affichage de l'image
		$output .= $img;
		$output .= '<ul>';
			$output .= sprintf('<li>%s</li>', $age);
			$output .= sprintf('<li>%s</li>', $sexe);
			$output .= sprintf('<li><a href="%s">Lien vers la fiche</a></li>', $lien);
		$output .= '</ul>';


		endwhile;
else :
		// pas de champs Repeater
		echo "pas de champ Repeater dans le coin !";
endif;
	
	// Affichage final du HTML
	echo $output;




} // FIN function resto_contenu_cuisinier_repeater() 


genesis();