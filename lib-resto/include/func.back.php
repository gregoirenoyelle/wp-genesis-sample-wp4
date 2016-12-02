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