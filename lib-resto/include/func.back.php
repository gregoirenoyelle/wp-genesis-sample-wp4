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


//* Ajouter le support de page pour les articles
add_post_type_support( 'post', 'page-attributes' );

//* Changer ordre d'affichage dans les pages d'archives des articles
add_action( 'pre_get_posts', 'gn_post_archive_order' );
function gn_post_archive_order( $query ) {
	if ( $query->is_main_query() && !is_admin() && $query->is_category() || $query->is_tag() ) {
		$query->set( 'orderby', 'menu_order' );
		$query->set('order','ASC');
	}
}


// Retirer le menu Widgets
// A mettre dans votre fichier functions.php
// sans les balises PHP
add_action( 'admin_menu', 'gn_remove_submenus', 999     );
function gn_remove_submenus() {
	if ( !current_user_can('manage_options' ) ) {
	    remove_submenu_page( 'themes.php', 'widgets.php' );
	}
}

/* Retirer les options de maquette dans un modèle de page */
add_action( 'init', 'custom_remove_custom_layouts' );
function custom_remove_custom_layouts() {
	if ( ! isset( $_GET['post'] ) ) {
		return;
	}
	$template_file = get_post_meta( $_GET['post'], '_wp_page_template', true );
	// aff_v($template_file); exit;
	if ( $template_file == 'modele-flexible-recette.php' ) {
		remove_theme_support( 'genesis-inpost-layouts' );
	}
}

