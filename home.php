<?php 

//* Contenu de la page d'accueil
add_action( 'genesis_meta', 'ap_contenu_page_accueil' );
function ap_contenu_page_accueil() {
	if ( is_active_sidebar('accueil-haut') || is_active_sidebar('accueil-bas') ) {
		// Forcer la plein largeur
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

	}
} // FIN function ap_contenu_page_accueil()

genesis();