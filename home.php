<?php 

//* Contenu de la page d'accueil
add_action( 'genesis_meta', 'ap_contenu_page_accueil' );
function ap_contenu_page_accueil() {
	if ( is_active_sidebar('accueil-haut') || is_active_sidebar('accueil-bas') ) {

		// Forcer la plein largeur
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		//* Enlever le fil d'Ariane
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Retirer la boucle principale
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Ajouter du contenu dans la zone principale avec le premier widget
		add_action( 'genesis_loop', 'ap_accueil_haut' );

			//* Ajouter du contenu dans la zone principale avec le deuxième widget
		add_action( 'genesis_loop', 'ap_accueil_bas', 15 );


	}
} // FIN function ap_contenu_page_accueil()


//* Appel des zone de widget

// Accueil haut
function ap_accueil_haut() {
	genesis_widget_area( 'accueil-haut', array(
		'before' => '<div class="accueil-haut widget-area">',
		'after'  => '</div>',
	) );

}

// Accueil bas
function ap_accueil_bas() {
	genesis_widget_area( 'accueil-bas', array(
		'before' => '<div class="accueil-bas widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

genesis();