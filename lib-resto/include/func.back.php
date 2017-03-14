<?php
// Toutes les fonctions pour gérer le back-office

//** Enlever toutes les barres latérales de gauche

//* Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );

//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );


//* Zone de Widget
genesis_register_sidebar( array(
    'id'          => 'accueil-haut',
    'name'        => 'Accueil - Haut de page',
    'description' => 'Partie haute de ma page d\'Accueil.',
) );
genesis_register_sidebar( array(
    'id'          => 'accueil-bas',
    'name'        => 'Accueil - Bas de page',
    'description' => 'Partie basse de ma page d\'Accueil.',
) );

// Ajouter un format d'image
add_image_size( 'slick-slider', 1500, 540, TRUE );


/* Retirer les options de maquette dans un modèle de page */
add_action( 'init', 'custom_remove_custom_layouts' );
function custom_remove_custom_layouts() {
	if ( ! isset( $_GET['post'] ) ) {
		return;
	}
	$template_file = get_post_meta( $_GET['post'], '_wp_page_template', true );
	// aff_v($template_file); exit;
	if ( $template_file == 'modele-page-builder.php' ) {
		remove_theme_support( 'genesis-inpost-layouts' );
	}
}
