<?php 

// A placer dans le fichier functions.php de votre thème
//* Contrôle si Advanced Custom Field est actif sur le site
if ( ! function_exists( 'get_field' ) ) {
	// Notice dans le back-office au moment de la désactivation
	add_action('admin_notices','gn_warning_admin_missing_acf');
	function gn_warning_admin_missing_acf() {
	   $plugin_url = get_bloginfo('url') . '/wp-admin/plugins.php';
	   $output = '<div id="my-custom-warning" class="error fade">';
	   $output .= sprintf('<p><strong>Attention</strong>, ce site ne fonctionne pas sans l\'extension <strong>Advanced Custom Fields</strong>. Merci d\'activer cette <a href="%s">extension</a>.</p>', $plugin_url);
	   $output .= '</div>';
	   echo $output;
	 }
	// Notice dans le front qui masque tout le contenu et affiche le lien pour ce connecter
	add_action( 'template_redirect', 'gn_template_redirect_warning_missing_acf', 0 );
	function gn_template_redirect_warning_missing_acf() {
		wp_die( sprintf( 'Ce site ne fonctionne pas sans l\'extension <strong>Advanced Custom Fields</strong>. Merci de vous <a href="%s">connecter au site</a> pour l\'activer.', wp_login_url() ) );
	}
}


/**
 * Ajouter page d'options ACF 5
 *
 * @package ACF
 */
if( function_exists('acf_add_options_page') ) {
	// Page principale
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));
  
  // Première sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options d\'Entête',
		'menu_title'    => 'Entête',
		'parent_slug'   => 'options-generales',
	));

  // Première sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options de Typographie',
		'menu_title'    => 'Typographie',
		'parent_slug'   => 'options-generales',
	));

}


//* Affichage des champs pour l'entête

// Annonce du site
add_action( 'genesis_header_right', 'ap_annonce_site' );
function ap_annonce_site() {
	// Variable
	$text = get_field('ap_annonce_site', 'option');
	$taille = get_field('ap_taille_de_lannonce', 'option');
	$couleur = get_field('ap_couleur_du_texte', 'option');
	// aff_p($text);	
	printf('<p style="font-size:%spx; color:%s">%s</p>', $taille, $couleur, $text);
} // FIN function ap_annonce_site()


// Hauteur de l'entête
add_action( 'wp_head', 'ap_taille_entete', 1000 );
function ap_taille_entete() { 
// Variable ACF
$padding = get_field('ap_hauteur_de_lentete', 'option'); 
$font_size = get_field('ap_tailles_des_titres', 'option');
// Utilisation de la fonction php str_replace pour remplacer les virgules par des points
$font_size = str_replace(',', '.', $font_size);
// aff_v($font_size); exit;
?>	
	<style type="text/css">
		.site-header > .wrap {
			padding: <?php echo $padding; ?>px 0;
		}	
		.entry-title {
			font-size: <?php echo $font_size; ?>rem;
		}			
	</style>

<?php } // FIN function ap_taille_entete() 

// Masquer des éléments de l'interface
add_action('genesis_meta', 'ap_fitre_interface');
function ap_fitre_interface() {
	// Variable ACF Options
	$post_info = get_field('ap_masquer_post_info', 'option');
	$post_meta = get_field('ap_masquer_post_meta', 'option');
	// aff_v($post_info); exit;

	// Condition si la case est cochée : get_field('ap_masquer_post_info', 'option');
	if ( $post_info ) {
		// pour enlever les info du post, après le titre de l'article
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );		
	}

	// Condition si la case est cochée : get_field('ap_masquer_post_info', 'option');
	if ( $post_meta ) {
		// pour enlever les métas et les balise footer du post en bas de l'article
		remove_all_actions( 'genesis_entry_footer');	
	}


}




