<?php
// Modèle pour la catégorie italiens

// Maquette Pleine largeur
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );


genesis();
