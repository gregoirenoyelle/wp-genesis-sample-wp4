<?php
// Template Name: Page avec option

// Option pour masquer le titre
$masquer_titre = get_field('ap_masquer_le_titre');
if( $masquer_titre) {
	remove_action('genesis_entry_header','genesis_do_post_title');
}
// Afficher le sous-titre
add_action( 'genesis_entry_header','ap_afficher_sous_titre', 11);
function ap_afficher_sous_titre(){
	$sous_titre = get_field('ap_sous_titre');
	if ( $sous_titre) {
		echo'<h3>';
		echo $sous_titre;
		echo '</h3>';
	}
}

genesis();
?>