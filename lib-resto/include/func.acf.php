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


if( function_exists('acf_add_options_page') ) {
	// Page principale
	acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_pages',
		'icon_url'      => 'dashicons-admin-settings',
		'position'      => '6',
		'redirect'      => true
	));
  
  // Première sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options d\'Entête',
		'menu_title'    => 'Entête',
		'parent_slug'   => 'options-generales',
	));
  // Deuxième sous-page
	acf_add_options_sub_page(array(
		'page_title'    => 'Options de Pied de Page',
		'menu_title'    => 'Pied de page',
		'parent_slug'   => 'options-generales',
	));
} 

// Styles ACF dans le header
add_action( 'wp_head', 'resto_css_header', 1000 );
function resto_css_header() {
// Variable ACF
$font_size = get_field('option_taille_titre', 'option');
$color = get_field('option_couleur_titre', 'option');
$font_size_replace = str_replace(',', '.', $font_size);
?>
	<style type="text/css">
		.site-title {
			font-size: <?php echo $font_size_replace; ?>rem;
		}
		.site-title a {
			color: <?php echo $color; ?>;
		}
	</style>

<?php } // FIN function resto_css_header() 



