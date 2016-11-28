<?php
// Template Name: Mon modèle test

// ajouter une video
add_action( 'genesis_entry_header', 'ap_video_avant_contenu');
function ap_video_avant_contenu() {
	//affichage du champ video (Zone de texte) ajouter par ACF
	the_field('ap_code_video');
}

genesis();
?>