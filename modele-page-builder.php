<?php
// Template Name: Modèle de page avec page builder

// Option pour masquer le titre
$masquer_titre = get_field('ap_masquer_le_titre_page_builder');
if( $masquer_titre) {
	remove_action('genesis_entry_header','genesis_do_post_title');
}

// Maquette Pleine largeur
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Imposer la couleur sur le titre
add_action('wp_head','ap_couleur_du_titre',900);
function ap_couleur_du_titre() { 
$color = get_field('ap_couleur_du_titre');
?>
	<style type"text/css">
		.entry-title { 
			color:<?php echo $color; ?>;
		}		
	</style>
<?php } // Fin de la fonction couleur du titre


genesis();
?>