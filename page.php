<?php
// Modèle pour toutes les pages

// Affichage de la variable post après le contenu
// add_action( 'genesis_entry_content', 'ap_affichage_post', 11 );
function ap_affichage_post() {
	// Récupérer dans la fonction la variable $post qui est globale
	global $post;

	// Utilisation de la fonction pour l'affichage de $post
	// voir /genesis-sample/lib-resto/include/func.debug.php
	aff_p($post); 
	// enlever le commentaire sur exit pour stopper l'exécution du code
	// exit;
}


genesis();