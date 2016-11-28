<?php 
// Toutes les fonctions pour gérer le back-office

//** Enlever toutes les barres latérales de gauche

//* Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );

//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );
 
//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );