<?php
// règlage spécifiques pour les archives 

// pour enlever l'image à la une générée automatiquement
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

// pour enlever le contenu de l'éditeur (contenu classique ou extrait)
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// Maquette Pleine largeur
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

?>